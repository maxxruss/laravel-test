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
use Psr\Http\Message\ServerRequestInterface;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    protected $stringProcessingService;

    public function __construct(StringProcessingService $stringProcessingService)
    {
        $this->stringProcessingService = $stringProcessingService;
    }

    public function home(Request $request)
    {
        // $request->flash();
        // var_dump('ok');
        // die();

        // Получаем экземпляр текущего пользователя
        $users = [
            ['id' => 1, 'name' => 'test1'],
            ['id' => 2, 'name' => 'test2'],
        ];


        return view('home')->with('names', $users);

        // return View::first(['home', 'admin.home'], ['login' => 'admin']);
    }

    public function testGet(Request $request)
    {


        // $value = $request->session()->all();
        // $request->session()->now('status', 'Task was successful!');
        // $request->session()->put('name', 'max');
        // $request->session()->put('age', 41);
        // session(['name' => 'max']);
        // session(['age' => 41]);
        // Session::put('progress1', '5%');
        // Session::save();

        // $data = Session::all();
        // $data = session::all();
        $data = $request->session()->get('progress1');

        echo json_encode($data);
        // return 'Hello World';
        // return response('Hello World')->cookie(
        //     'test_cookie', 'ok', 10000
        // );

        // return response('Hello World')->withoutCookie('test_cookie');
        // return redirect('/');
        // return back()->withInput();
        // return redirect()->route('give_me_data_lpz', ['id' => 1]);

        // return redirect('/api/home')->with('status', 'Profile updated!');
        // $users = User::all();
        // return response()->json(['users' => $users]);

        // $pathToFile = storage_path('app/test_image.jpeg'); // Путь к файлу, который нужно скачать
        // $name = 'test_image.jpeg'; // Имя файла, как он будет сохранен на компьютере пользователя
        // $user = User::first();
        // echo url("/posts/{$user->login}");

        // return response()->file($pathToFile);
    }

    public function getData(Request $request)
    {
        // Получаем значение заголовка X-Header
        // $cookieValue = $request->cookie('color');

        // Возвращаем какие-то данные в ответе
        // return response()->json(['test' => 111]);
        // $result = $this->stringProcessingService->processString('result', 2);


        return response()->json([
            'result' => 'getData',
            'params' => $request->all(),
            // 'query' => $request->query('id'),
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

    public function testPost(Request $request)
    {
        $path = $request->my_file->storeAs('images', 'word.doc');
        // $file = $request->file('my_file');
        return response()->json([
            'path' => $path,
            // 'ext' => $request->my_file->extension(),
            // 'tmp' => sys_get_temp_dir(),
        ]);

        // var_dump($file->);die();
    }

    public function test(Request $request)
    {
        // $request->flash();
        // var_dump('ok');
        // die();
        return response()->json([
            'result' => $request->all()
        ]);
    }

    public function profile()
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

    public function getPsr(ServerRequestInterface $request_psr)
    {
        return response()->json([
            'result' => $request_psr
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
