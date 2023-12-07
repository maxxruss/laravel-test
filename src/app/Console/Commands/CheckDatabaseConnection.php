<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckDatabaseConnection extends Command
{
    protected $signature = 'database:check';

    protected $description = 'Проверить соединение с базой данных';

    public function handle()
    {
        try {
            DB::connection()->getPdo();
            $this->info("Соединение с базой данных установлено успешно.");
        } catch (\Exception $e) {
            $this->error("Не удалось установить соединение с базой данных: " . $e->getMessage());
        }
    }
}

