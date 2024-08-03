<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmail extends Notification
{
	use Queueable;

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
		$url = 'dummy-for-now';
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
}
