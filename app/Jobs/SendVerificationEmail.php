<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\VerifyEmail;

class SendVerificationEmail implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	protected $customer;

	public function __construct($customer)
	{
		$this->customer = $customer;
	}

	public function handle()
	{
		$this->customer->notify(new VerifyEmail());
	}
}
