<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Types;
use Illuminate\Support\Facades\Mail;

class TypesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'age' => 10
        ];
    }

    // // Отключаем метки времени (timestamps)
    // public function configure()
    // {
    //     return $this->afterMaking(function (Types $types) {
    //         info('afterMaking');
    //     })->afterCreating(function (Types $types) {
    //         $types->age = 8;
    //         $types->save();
    //     });
    // }

    /**
     * Указать, что аккаунт пользователя временно приостановлен.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function suspended()
    {
        return $this->state(function (array $attributes) {
            return [
                'age' => '5',
            ];
        });
    }
}
