<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Registration\UserCreationService;
use App\Services\Registration\Interfaces\RegistrationInterface;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		$this->app->bind(RegistrationInterface::class, UserCreationService::class);
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
	}
}
