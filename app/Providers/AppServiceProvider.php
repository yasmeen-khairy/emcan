<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Course;
use App\Models\Application;
use App\Repositories\UserRepository;
use Illuminate\Pagination\Paginator;
use App\Repositories\CourseRepository;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RepositoryInterface;
use App\Repositories\ApplicationRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, function ($app) {
            return new UserRepository(new User());
        });
    
        $this->app->bind(CourseRepository::class, function ($app) {
            return new CourseRepository(new Course());
        });

        $this->app->bind(ApplicationRepository::class, function ($app) {
            return new ApplicationRepository(new Application());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
