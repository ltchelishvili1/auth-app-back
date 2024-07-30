<?php

namespace App\Services\Registration;

use App\Models\Customer;
use App\Services\Registration\Interfaces\RegistrationInterface;
use App\Services\Registration\Results\CustomerCreationResult;
use Illuminate\Validation\ValidationException;

class UserCreationService implements RegistrationInterface
{
	public function createCustomer(array $userData): CustomerCreationResult
	{
		try {
			$customer = Customer::create($userData);

			return new CustomerCreationResult(
				success: true,
				customer: $customer,
				status: 201
			);
		} catch (ValidationException $e) {
			return new CustomerCreationResult(
				success: false,
				message: 'Validation failed',
				errors: $e->errors(),
				status: 422
			);
		} catch (\Exception $e) {
			return new CustomerCreationResult(
				success: false,
				message: 'An error occurred, please try again later.',
				status: 500
			);
		}
	}
}
