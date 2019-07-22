<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Company;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testUserLogin()
    {
        $this->assertArrayHasKey('data', $this->userCredentials);
        $this->assertArrayHasKey('signIn', $this->userCredentials['data']);
        $this->assertArrayHasKey('access_token', $this->userCredentials['data']['signIn']);
    }

    public function testUserLogout() {

        $response = $this
            ->withHeaders($this->getAuthorizedHeader())
            ->json('POST', '/graphql/secret', ['query' => "mutation{signOut{id, name, email}}"]);
        
        $response = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('signOut', $response['data']);
        $this->assertArrayHasKey('id', $response['data']['signOut']);
    }

    public function testUserCreateWithSuperAdminAccPass() {

        $company  = factory(Company::class)->create();
        $response = $this
            ->withHeaders($this->getAuthorizedHeader())
            ->json('POST', '/graphql/secret', ['query' => "mutation {
                insertUser(
                    company_id: $company->id,
                    name: \"ephraim\",
                    email: \"lambarteephraim@gmail.com\",
                    password: \"password\"
                    )
                {id, name, email, company_id}}"]);

        $this->assertDatabaseHas(User::getTableName(), [
            'email'      => 'lambarteephraim@gmail.com',
            'name'       => 'ephraim',
            'company_id' => $company->id
        ]);
    }
}
