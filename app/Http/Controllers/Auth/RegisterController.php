<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Services\Registration\Interfaces\RegistrationInterface;
use App\Http\Resources\CustomerResource;
use App\Jobs\SendVerificationEmail;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
	protected RegistrationInterface $userCreationService;

	public function __construct(RegistrationInterface $userCreationService)
	{
		$this->userCreationService = $userCreationService;
	}

	public function register(RegisterRequest $request)
	{
		$validated = $request->validated();

		$customerCreation = $this->userCreationService->createCustomer($validated);

		if (!$customerCreation->success) {
			return response()->json(['message' => $customerCreation->message], $customerCreation->status);
		}

		$customer = $customerCreation->customer;

		event(new Registered($customerCreation->customer)); // comment this if you want to use jobs
		//SendVerificationEmail::dispatch($customer);  =>  // uncomment this if you want to use jobs

		return response()->json(['customer' =>  new CustomerResource($customerCreation->customer)], $customerCreation->status);
	}
}
