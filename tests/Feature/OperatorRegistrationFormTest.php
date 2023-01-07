<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Support\Str;
use App\Models\User;

class OperatorRegistrationFormTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');
 
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_select_form_is_rendered()
    {
        $response = $this->get('/signup');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_registation_form_is_rendered()
    {
        $response = $this->postJson('/signup', ['user' => 'operator']);
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_new_user_is_registered()
    {
        $user = User::factory()->create();
 
        $response = $this ->withHeaders(['Accept' => 'application/json'])->actingAs($user)->withSession(['foo' => 'bar'])->postJson('/signup_operator', [
            'login' => Str::random(8),
            'user_type' => 'operator',
            'password' => 'zaq1@WSX',
            'password_confirmation' => 'zaq1@WSX',
            'user_type' => 'operator',
            'email' => Str::random(8).'@gmail.com',
            'phone' => '111444555',
            'tin' => 'PL111222330'
        ]);
        $response->assertRedirect('/');


    }
}
