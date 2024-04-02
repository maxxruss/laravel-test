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
use App\Models\Types;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use App\Models\Phones;
use App\Models\Post;
use App\Models\Comment;
use App\Service;
use Mockery\MockInterface;
use Illuminate\Support\Facades\Cache;


class MainControllerTest extends TestCase
{
    // use WithoutMiddleware;
    // use DatabaseTransactions;
    // use DatabaseMigrations;
    // use RefreshDatabase;
    use WithFaker;


    /** @test */
    public function testGetData()
    {
        // $response = $this->json('GET', '/api/getData');
        $response = $this->getJson('/api/getData');
        dd($response->json());

        $response->assertStatus(200)
            ->assertJson([
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'age' => 30
            ]);
    }

    public function testOldData()
    {
        // Отправляем PUT-запрос на /api/endpoint с данными ['key' => 'value']
        $response = $this->get('/test');
        // $response->dd();
        // dd($response->decodeResponseJson());


        // Проверяем, что запрос выполнен успешно (код ответа 200)
        $response->assertStatus(200);

        $response->assertJson(
            function (AssertableJson $json) {
                // dd($json);
                $json
                    ->first(function ($sub_json) {
                        // dd($sub_json);
                        $sub_json
                            ->where('test4', 444)
                            ->where('test5', 555)
                            ->where('test6', 666);
                    })
                    ->etc()
                    // ->where('test', 111)
                    // ->missing('password')
                    // ->hasAll('data', 'data2')
                    // ->has(2)
                    // ->hasany('data', 'message', 'code')
                    // ->missingAll('message', 'code')
                    // ->has('data', 3)
                    // ->has('data', 3, function ($jsonSub) {
                    //     $jsonSub->where('test1', 111);
                    // })
                ;
            }
        );

        // // Проверяем, что ответ содержит определенные данные
        // $response->assertJson(['status' => 'success']);

        // // Проверяем, что ответ содержит определенный ключ
        // $response->assertJsonFragment(['key' => 'value']);
    }

    public function testData()
    {
        // Storage::fake('avatars');

        // $file = UploadedFile::fake()->image('avatar.jpg');
        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            // Другие необходимые поля
        ];

        $response = $this->postJson('api/postData', $userData);
        // $response->assertValid(['email']);
        // $this->assertAuthenticated($guard = null);
        // $response->assertStatus(404);
        // $response->assertCookie('color', 'blue');
        // $response->assertDownload();
        // $response->assertHeader('Content-FileName', 'avatar1.jpg');
        // $response->assertOk();
        // $response->assertNotFound();
        // $response->assertJsonFragment(['user' => 'Taylor Otwell']);
        // $response->assertJsonPath('data.test4.user', 'Taylor Otwell');
        // $response->assertExactJson([
        //     'data' =>
        //     [
        //         'test4' => [
        //             'user' => 'Taylor Otwell'
        //         ],
        //         'test5' => 555,
        //         'test6' => 666
        //     ]
        // ]);
        dd($response);

        // Перемещаем фейковый файл на диск
        // Storage::disk('avatars')->putFileAs('/', $file, $file->hashName());

        // Storage::disk('avatars')->assertExists($file->hashName());

        // Storage::disk('avatars')->assertMissing('missing.jpg');

        // $response->assertDownload();
        // $response->assertHeader('Content-Disposition', 'attachment');
    }

    /**
     * Test a console command.
     *
     * @return void
     */
    public function test_console_command()
    {
        // $this->artisan('mail:send 1')->assertSuccessful();
        // Artisan::call('mail:send max --id=1 --id=2');

        $user = 'max';

        Artisan::call('mail:send', [
            'user' => $user, '--id' => 1, '--id' => 2
        ]);
    }

    /**
     * Test a console command.
     *
     * @return void
     */
    public function test_types()
    {
        // $types = Types::factory()->create();

        // $user = User::factory()
        //     ->has(Phones::factory()->count(3))
        //     ->create();


        // dd($user);
        // $this->artisan('mail:send 1')->assertSuccessful();
        // Artisan::call('mail:send max --id=1 --id=2');
        $post = Post::factory()->has(Comment::factory()->count(3))->create();
        // $comments = Comment::factory()->count(4)->for(
        //     Post::factory(), 'commentable'
        // )->create();
        dd($post);
    }

    /** @test */
    public function test_fake()
    {
        Cache::shouldReceive('get')
            ->once()
            ->with('key')
            ->andReturn('value1');

        $response = $this->getJson('/api/getFake');
        dd($response->json());

        $response->assertStatus(200)
            ->assertJson([
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'age' => 30
            ]);
    }
}
