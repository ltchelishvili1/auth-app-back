<?php

namespace App\Services\EmailVerification\Interfaces;

use App\Services\EmailVerification\Results\EmailVerificationResult;

interface EmailVerificationInterface
{
	public function verifyEmail(string $id, string $email): EmailVerificationResult;
}
