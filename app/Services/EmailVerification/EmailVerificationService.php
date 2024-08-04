<?php

namespace App\Services\EmailVerification;

use App\Models\Customer;
use App\Services\EmailVerification\Interfaces\EmailVerificationInterface;
use Illuminate\Validation\ValidationException;
use App\Services\EmailVerification\Results\EmailVerificationResult;

class EmailVerificationService implements EmailVerificationInterface
{
	public function verifyEmail(string $id, string $email): EmailVerificationResult
	{
		try {
			$customer = Customer::find($id);

			if (!$customer) {
				return new EmailVerificationResult(
					success: false,
					message: 'Customer not found',
					status: 404
				);
			}

			$customer->email = $email;
			$customer->save();
			$customer->markEmailAsVerified();

			return new EmailVerificationResult(
				success: true,
				message: 'Email verified successfully',
				status: 201
			);
		} catch (ValidationException $e) {
			return new EmailVerificationResult(
				success: false,
				message: 'Validation error: ' . $e->getMessage(),
				status: 422
			);
		} catch (\Exception $e) {
			return new EmailVerificationResult(
				success: false,
				message: 'An error occurred, please try again later.',
				status: 500
			);
		}
	}
}
