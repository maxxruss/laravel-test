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

class MainControllerTest extends TestCase
{
    use WithoutMiddleware;
    // use DatabaseTransactions;
    // use DatabaseMigrations;
    // use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function testGetData()
    {
        // $response = $this->json('GET', '/api/getData');
        $response = $this->postJson('/api/getData', ['name' => 'max']);

        $response->assertStatus(200)
            ->assertJson([
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'age' => 30
            ]);
    }

    public function testPostData()
    {
        // $response = $this->json('GET', '/api/getData');
        // $response = $this->postJson('/api/postData', ['name' => 'max']);

        // $response = $this->withHeaders(['X-Header' => 'max_header'])->post('/api/postData');

        $response = $this->withCookie('color', 'blue')->get('/testCookie');
        // dd($response);

        $response->assertStatus(200)
            ->assertCookie('color', 'blue');



        // $response->assertStatus(200)
        //     ->assertJson([
        //         'name' => 'max',
        //         'email' => 'john@example.com',
        //         'age' => 30
        //     ]);
    }
}
