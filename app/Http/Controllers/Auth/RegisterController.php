<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Services\Registration\Interfaces\RegistrationInterface;
use App\Http\Resources\CustomerResource;

class RegisterController extends Controller
{
	protected RegistrationInterface $formSubmissionService;

	protected array $properties;

	public function __construct(RegistrationInterface $formSubmissionService, array $properties = [])
	{
		$this->formSubmissionService = $formSubmissionService;

		$this->properties = $properties;
	}

	public function register(RegisterRequest $request)
	{
		$validated = $request->validated();

		$customerCreation = $this->formSubmissionService->createCustomer($validated);

		if (!$customerCreation->success) {
			return response()->json(['message' => $customerCreation->message], $customerCreation->status);
		}

		$customer = new CustomerResource($customerCreation->customer);

		return response()->json(['customer' => $customer], $customerCreation->status);
	}
}
