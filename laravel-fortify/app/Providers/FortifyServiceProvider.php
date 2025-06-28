<?php

namespace App\Providers;

use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use Laravel\Fortify\Contracts\LoginResponse;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;
use App\Models\User;



class FortifyServiceProvider extends ServiceProvider
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
	public function boot()
    {		
		$this->app->singleton(CreatesNewUsers::class, CreateNewUser::class);
		$this->app->singleton(UpdatesUserProfileInformation::class, UpdateUserProfileInformation::class);
		$this->app->singleton(UpdatesUserPasswords::class, UpdateUserPassword::class);
		$this->app->singleton(ResetsUserPasswords::class, ResetUserPassword::class);
	
        Fortify::loginView(fn () => view('auth.login'));
        Fortify::registerView(fn () => view('auth.register'));

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }
        });
    }
}
