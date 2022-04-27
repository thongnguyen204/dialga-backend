<?php
namespace App\Repositories;

use App\Repositories\Impl\ArticleRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class BackendRepositoryProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ArticleRepository::class,
            ArticleRepositoryImpl::class
        );
    }
}