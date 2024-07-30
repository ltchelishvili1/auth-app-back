<?php

namespace App\Services\Registration\Results;

use App\Models\Customer;

class CustomerCreationResult
{
	public bool $success;

	public ?Customer $customer;

	public ?string $message;

	public ?int $status;

	public ?array $errors;

	public function __construct(bool $success, ?Customer $customer = null, ?string $message = null, ?array $errors = null, ?int $status = null)
	{
		$this->success = $success;
		$this->customer = $customer;
		$this->message = $message;
		$this->errors = $errors;
		$this->status = $status;
	}
}
