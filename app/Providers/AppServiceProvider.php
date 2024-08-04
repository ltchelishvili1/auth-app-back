<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Registration\UserCreationService;
use App\Services\EmailVerification\EmailVerificationService;
use App\Services\Registration\Interfaces\RegistrationInterface;
use App\Services\EmailVerification\Interfaces\EmailVerificationInterface;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		$this->app->bind(RegistrationInterface::class, UserCreationService::class);
		$this->app->bind(EmailVerificationInterface::class, EmailVerificationService::class);
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
	}
}
