<?php

namespace App\Providers;

use App\Repositories\CommentRepository;
use App\Repositories\Interface\CommentRepositoryInterface;
use App\Repositories\Interface\PostRepositoryInterface;
use App\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            CommentRepositoryInterface::class,
            CommentRepository::class,
        );
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
