<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('manage-home', function($user){
            return $user->role == 'admin';
        });
        Gate::define('manage-users', function($user){
            return $user->role == 'admin';
        });
        Gate::define('manage-lessons', function($user){

            return $user->role == 'admin';
        });
        Gate::define('manage-pratices', function($user){

            return $user->role == 'admin';
        });
        Gate::define('manage-course', function($user){

            return $user->role == 'admin' && $user->role == 'client';
        });
        //
    }
}
