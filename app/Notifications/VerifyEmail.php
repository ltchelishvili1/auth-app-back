<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Notification
{
	use Queueable;

	/**
	 * The callback that should be used to create the verify email URL.
	 *
	 * @var \Closure|null
	 */
	public static $createUrlCallback;

	/**
	 * Get the notification's delivery channels.
	 *
	 * @return array<int, string>
	 */
	public function via(object $notifiable): array
	{
		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 */
	public function toMail(object $notifiable): MailMessage
	{
		$url = $this->verificationUrl($notifiable);
		$appName = config('app.name');
		$name = $notifiable->first_name . ' ' . $notifiable->last_name;
		return (new MailMessage())
			->subject('Email Verification ' . '(' . $appName . ')')
			->view('email.verify-message', [
				'url'     => $url,
				'appName' => $appName,
				'name'    => $name,
			]);
	}

	/**
	 * Get the verification URL for the given notifiable.
	 *
	 * @param mixed $notifiable
	 *
	 * @return string
	 */
	protected function verificationUrl($notifiable)
	{
		if (static::$createUrlCallback) {
			return call_user_func(static::$createUrlCallback, $notifiable);
		}

		return URL::temporarySignedRoute(
			'verification.verify',
			Carbon::now()->addMinutes(config('auth.verification.expire', 60)),
			[
				'id'    => $notifiable->getKey(),
				'email' => $notifiable->getEmailForVerification(),
			]
		);
	}
}
