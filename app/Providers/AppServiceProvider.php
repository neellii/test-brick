<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // gate to check if user is admin
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });
        // change language of mail messages 
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Подтвердите email')
                ->line('Перейдите по ссылке ниже для верификации email')
                ->action('Подтвердить email', $url);
        });
        // use Bootstrap 5 styles for pagination
        Paginator::useBootstrapFive();
    }
}
