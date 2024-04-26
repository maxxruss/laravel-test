<?php

namespace App\View\Composers;

use App\Models\User;
use Illuminate\View\View;

class ProfileComposer
{
    protected $users;

    /**
     * Создать нового компоновщика профиля.
     *
     * @return void
     */
    public function __construct(User $users)
    {
        // Зависимости автоматически внедрятся контейнером служб ...
        $this->users = $users;
    }

    /**
     * Привязать данные к шаблону.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $count = $this->users->count();
        $view->with('count', $count);
    }
}
