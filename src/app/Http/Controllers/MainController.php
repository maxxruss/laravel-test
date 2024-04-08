<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Models\User;
use App\Services\StringProcessingService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;


class MainController extends Controller
{
    protected $stringProcessingService;

    public function __construct(StringProcessingService $stringProcessingService)
    {
        $this->stringProcessingService = $stringProcessingService;
    }

    public function profile($request)
    {
        var_dump('ok');
        die();
        // return response()->json([
        //     'result' => 'ok'
        // ]);
    }

    public function getFake()
    {
        $value = Cache::get('key');

        return response()->json([
            'result' => $value
        ]);
    }

    public function get_1()
    {
        return response()->json([
            'result' => 1
        ]);
    }

    public function get_2(Request $request)
    {
        return response()->json([
            'result' => $request->expectsJson()
        ]);
    }

    public function getUser(User $user)
    {
        return response()->json([
            'result' => $user
        ]);
    }

    public function getRoute()
    {
        $route = Route::current(); // Illuminate\Routing\Route
        $name = Route::currentRouteName(); // string
        $action = Route::currentRouteAction(); // string

        return response()->json([
            'route' => $route,
            'name' => $name,
            'action' => $action
        ]);
    }

    public function getData(Request $request)
    {
        // Получаем значение заголовка X-Header
        // $cookieValue = $request->cookie('color');

        // Возвращаем какие-то данные в ответе
        // return response()->json(['test' => 111]);
        $result = $this->stringProcessingService->processString('result', 2);

        return response()->json([
            'result' => $result
        ]);

        // Получаем путь к файлу
        // Получение файла для скачивания

        // Создание объекта Response
        // $response = new Response();

        // // Установка заголовка Content-Disposition
        // $response->header('Content-Disposition', 'attachment');

        // // Возвращаем файл в виде ответа
        // return $response;

        return response()->json(['cookieValue' => []]);
    }

    public function postData(Request $request)
    {
        // Получаем значение заголовка X-Header
        // $cookieValue = $request->cookie('color');
        // return response()->json([
        //     'data' =>
        //     [
        //         'test4' => [
        //             'user' => 'Taylor Otwell'
        //         ],
        //         'test5' => 555,
        //         'test6' => 666
        //     ]
        // ]);

        // Storage::fake('avatars');

        // $file = UploadedFile::fake()->image('avatar.jpg');

        // Response::download, BinaryFileResponse

        // return response()->download($file, 'avatar.jpg', ['Content-FileName' => 'avatar.jpg']);


        // Возвращаем какие-то данные в ответе
        // $response->withCookie(cookie('color', 'blue')); // Добавляем cookie к ответу

        // return $response;
        // return response()->json(['cookieValue' => 'ok'], 404);
        // return response()->json(['cookieValue' => 'ok'])->withCookie(cookie('color', 'blue'));
        // Валидация входящих данных
        $validatedData = $request->validate([
            'name1' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            // Другие правила валидации для других полей
        ]);

        $validatedData = $request->validate(['name' => 'required|string|max:255', 'email' => 'required|email']);

        // Создание пользователя
        $user = User::create($validatedData);

        // Возвращаем успешный ответ с кодом 201 (Created)
        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    public function index()
    {
        $response = response(view('welcome')); // Создаем объект ответа

        $response->withCookie(cookie('color', 'blue')); // Добавляем cookie к ответу

        return $response;
    }
}
