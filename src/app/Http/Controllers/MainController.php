<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function getData()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'age' => 30
        ];

        return response()->json($data);
    }

    public function postData(Request $request)
    {
        // Получаем значение заголовка X-Header
        $cookieValue = $request->cookie('color');

        // Возвращаем какие-то данные в ответе
        return response()->json(['cookieValue' => $cookieValue]);
    }

    public function index()
    {
        return response(view('welcome'))->cookie('color', 'blue');
    }
}
