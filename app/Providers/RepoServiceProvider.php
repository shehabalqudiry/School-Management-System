<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\Teachers\TeacherRepositoryInterface',
            'App\Repository\Teachers\TeacherRepository');

        $this->app->bind(
            'App\Repository\Students\StudentRepositoryInterface',
            'App\Repository\Students\StudentRepository');

        $this->app->bind(
            'App\Repository\Students\Promotions\PromotionRepositoryInterface',
            'App\Repository\Students\Promotions\PromotionRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
