<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Services\Registration\Interfaces\RegistrationInterface;
use App\Http\Resources\CustomerResource;

class RegisterController extends Controller
{
	protected RegistrationInterface $userCreationService;

	protected array $properties;

	public function __construct(RegistrationInterface $userCreationService, array $properties = [])
	{
		$this->userCreationService = $userCreationService;

		$this->properties = $properties;
	}

	public function register(RegisterRequest $request)
	{
		$validated = $request->validated();

		$customerCreation = $this->userCreationService->createCustomer($validated);

		if (!$customerCreation->success) {
			return response()->json(['message' => $customerCreation->message], $customerCreation->status);
		}

		$customer = new CustomerResource($customerCreation->customer);

		return response()->json(['customer' => $customer], $customerCreation->status);
	}
}
