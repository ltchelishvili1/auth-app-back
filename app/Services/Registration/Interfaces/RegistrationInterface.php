<?php

namespace App\Services\Registration\Interfaces;

use App\Services\Registration\Results\CustomerCreationResult;

interface RegistrationInterface
{
	public function createCustomer(array $userData): CustomerCreationResult;
}
