<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\Factory; // Важный импорт для использования factory
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\User;

class AuthControllerTest extends TestCase
{
    use WithoutMiddleware;
    // use DatabaseTransactions;
    // use DatabaseMigrations;
    // use RefreshDatabase;
    use WithFaker;

    /**
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_auth()
    {
        // $new_user = User::factory()->create();
        // $fake_name = $this->faker->uuid();
        // dd($fake_name);

        $user = User::factory()->create([
            'login' => 'test',
            'password' => bcrypt('test'),
        ]);

        // Вызываем ваш метод авторизации
        $response = $this->post('/auth', [
            'login' => 'test',
            'password' => 'test',
            'remember' => true, // или false, в зависимости от вашей логики
        ]);

        // Проверяем, что пользователь был успешно аутентифицирован
        $response->assertJson([
            'result' => 'success',
            'check' => true,
        ]);

        // Проверяем, что пользователь действительно аутентифицирован
        $this->assertTrue(Auth::check());
    }
}
