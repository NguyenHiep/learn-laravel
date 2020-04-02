<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\CommentRepository;
use App\Repositories\CommentRepositoryEloquent;
use App\Repositories\PageRepository;
use App\Repositories\PageRepositoryEloquent;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostCategoryRepositoryEloquent;
use App\Repositories\PostMediaRepository;
use App\Repositories\PostMediaRepositoryEloquent;
use App\Repositories\PostRepository;
use App\Repositories\PostRepositoryEloquent;
use App\Repositories\PostTagRepository;
use App\Repositories\PostTagRepositoryEloquent;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryEloquent;
use App\Repositories\SliderRepository;
use App\Repositories\SliderRepositoryEloquent;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ProductRepository::class, ProductRepositoryEloquent::class);
        $this->app->bind(PostRepository::class, PostRepositoryEloquent::class);
        $this->app->bind(CommentRepository::class, CommentRepositoryEloquent::class);
        $this->app->bind(SliderRepository::class, SliderRepositoryEloquent::class);
        $this->app->bind(PostMediaRepository::class, PostMediaRepositoryEloquent::class);
        $this->app->bind(PageRepository::class, PageRepositoryEloquent::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryEloquent::class);
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(PostCategoryRepository::class, PostCategoryRepositoryEloquent::class);
        $this->app->bind(PostTagRepository::class, PostTagRepositoryEloquent::class);
    }
}
