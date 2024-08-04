<?php

namespace App\Http\Controllers;

use App\Services\EmailVerification\EmailVerificationService;

class EmailVerifyController extends Controller
{
	protected $emailVerificationService;

	public function __construct(EmailVerificationService $emailVerificationService)
	{
		$this->emailVerificationService = $emailVerificationService;
	}

	public function emailVerify(string $id, string $email)
	{
		try {
			$this->emailVerificationService->verifyEmail($id, $email);
			//  return redirect()->route('verification.success'); // or whatever your success route is
		} catch (\Exception $e) {
			// return redirect()->route('verification.error')->with('error', $e->getMessage()); // or whatever your error route is
		}
	}
}
