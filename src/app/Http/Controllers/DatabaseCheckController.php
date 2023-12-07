<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DatabaseCheckController extends Controller
{
    public function checkDatabaseConnection()
    {
        try {
            DB::connection()->getPdo();
            echo "Соединение с базой данных установлено успешно.";
        } catch (\Exception $e) {
            die("Не удалось установить соединение с базой данных: " . $e->getMessage());
        }
    }
}
