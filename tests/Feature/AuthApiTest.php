<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister()
    {


        $data = [
            'name' => 'Test Name',
            'email' => 'email@gmail.com',
            'password' => 'Password@2021^1',
        ];

        $this->post(route('/api/auth/signup'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }
}
