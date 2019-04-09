<?php

namespace App\Providers;

use App\Models\Business;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Product;
use App\Models\Review;
use App\Models\Tag;
use App\Policies\BusinessPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\PhotoPolicy;
use App\Policies\PostPolicy;
use App\Policies\ProductPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\TagPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Photo::class => PhotoPolicy::class,
        Category::class => CategoryPolicy::class,
        Tag::class => TagPolicy::class,
        Post::class => PostPolicy::class,
        Product::class => ProductPolicy::class,
        Business::class => BusinessPolicy::class,
        Review::class => ReviewPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
