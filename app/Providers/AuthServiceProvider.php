<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


//        middle ware for User
        Gate::define('manage-users' , function ($user){
            return $user->hasAnyRoles(['admin' , 'dataEntry']);
        });

        Gate::define('edit-users' , function ($user){
           return $user->hasRole('admin');
        });

        Gate::define('delete-users' , function ($user){
            return $user->hasRole('admin');
        });

//        end of middle ware for the user


//        middle ware for category

        Gate::define('manage-category' , function ($user){
            return $user->hasAnyRoles(['admin' , 'dataEntry']);
        });

        Gate::define('create-category' , function ($user){
            return $user->hasRole('admin');
        });

        Gate::define('delete-category' , function ($user){
            return $user->hasRole('admin');
        });
//        end of middle ware of category

        // Middle ware For News


        Gate::define('manage-News' , function ($user){
            return $user->hasAnyRoles(['admin' , 'dataEntry']);
        });

    }
}
