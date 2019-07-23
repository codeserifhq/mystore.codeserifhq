<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Company;
use App\Models\User;
use App\Models\Permission;

use App\Enums\UserSectionPermissionAliasEnum;

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

    public function testUserCreateWithSuperAdminAccFail() {

        $company  = factory(Company::class)->create();
        $response = $this
            ->withHeaders($this->getAuthorizedHeader())
            ->json('POST', '/graphql/secret', ['query' => "mutation {
                insertUser(
                    name: \"ephraim\",
                    email: \"lambarteephraim@gmail.com\",
                    password: \"password\"
                    )
                {id, name, email, company_id}}"]);

        $response = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('errors', $response);
        $this->assertContains('validation', $response['errors'][0]['message']);
    }

    public function testUserCreateWithNormalAccWithoutPermissionFail() {

        $company  = factory(Company::class)->create();

        $user = factory(User::class)->create();

        $this->userCredentials = $this->loginPassport($this, $user->email, 'password', true);  

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

        $response = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('errors', $response);
        $this->assertContains('Unauthorized', $response['errors'][0]['message']);
    }

    public function testUserCreateWithNormalAccPass() {
        $company  = factory(Company::class)->create();
        $company2 = factory(Company::class)->create();

        $user = factory(User::class)->create();

        $user->company_id = $company2->id;
        $user->save();
        
        $this->givePermission($user, UserSectionPermissionAliasEnum::CREATE_USER);

        $this->userCredentials = $this->loginPassport($this, $user->email, 'password', true);  

        $response = $this
        ->withHeaders($this->getAuthorizedHeader())
        ->json('POST', '/graphql/secret', ['query' => "mutation {
            insertUser(
              
                name: \"ephraim\",
                email: \"lambarteephraim@gmail.com\",
                password: \"password\"
                )
            {id, name, email, company_id}}"]);

        $response = json_decode($response->getContent(), true);

        $this->assertDatabaseHas(User::getTableName(), [
            'email'      => 'lambarteephraim@gmail.com',
            'name'       => 'ephraim',
            'company_id' => $company2->id
        ]);
    }

    public function givePermission($user, $permissionAlias) {
        $user->permissions()->attach(Permission::where('alias', UserSectionPermissionAliasEnum::CREATE_USER)->first()->id);
        return $user;
    }
}
