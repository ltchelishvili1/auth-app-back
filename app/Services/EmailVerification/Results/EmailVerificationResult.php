<?php

namespace App\Services\EmailVerification\Results;

class EmailVerificationResult
{
	public bool $success;

	public ?string $message;

	public ?int $status;

	public ?array $errors;

	public function __construct(bool $success, ?string $message = null, ?array $errors = null, ?int $status = null)
	{
		$this->success = $success;
		$this->message = $message;
		$this->errors = $errors;
		$this->status = $status;
	}
}
