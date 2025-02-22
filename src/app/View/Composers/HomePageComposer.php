<?php

namespace App\View\Composers;

use App\Models\User;
use Illuminate\View\View;

class HomePageComposer
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
        $users = $this->users->count();
        $view->with(['users' => $users, 'records' => '']);
    }
}
