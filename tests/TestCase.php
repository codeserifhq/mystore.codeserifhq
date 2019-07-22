<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Artisan;

use App\Models\User;
use App\Models\OauthClient;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;
    protected $userCredentials;

    public function setUp() : void
    {
        parent::setUp();

        // seed database
        Artisan::call('db:seed', ['--env' => 'testing']);
        
        //passport install
        Artisan::call('passport:install', ['--env' => 'testing']);

        $this->user = factory(User::class)->states('superadmin')->create();

        $this->userCredentials = $this->loginPassport($this, $this->user->email, 'password', true);  
    }

    protected function loginPassport($self, $email, $password, $decode = false) {

        $OauthClient = OauthClient::where('name', 'Laravel Password Grant Client')->first();

        $response = $self->withHeaders([
            'Accept' => 'json/application',
        ])->json('POST', '/graphql', ['query' => "mutation{signIn(username:\"$email\",password:\"$password\",client_id:\"$OauthClient->id\",client_secret:\"$OauthClient->secret\"){token_type,expires_in,access_token,refresh_token}}"]);
        return $decode ? 
            json_decode($response->getContent(), true) :
            $response;  
    }

    protected function getAuthorizedHeader() {
        return [
            'Accept'        => 'json/application',
            'Authorization' => 'Bearer ' . $this->userCredentials['data']['signIn']['access_token']
        ];
    }
}
