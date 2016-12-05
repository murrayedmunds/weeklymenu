<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('email_exists', function ($attribute, $value, $parameters, $validator) {
            $email = \App\Users::whereEmail($_POST['email'])->first();
            if ($email) {
                return true;
            } else {
                return false;
            }
        });

        \Validator::extend('valid_password', function ($attribute, $value, $parameters, $validator) {
            $user = \App\Users::whereEmail($_POST['email'])->first();
            $userPassword = $user['password'];
            return password_verify($_POST['password'], $userPassword);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
