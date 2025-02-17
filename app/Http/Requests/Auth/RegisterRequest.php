<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseFormRequest;

class RegisterRequest extends BaseFormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'first_name'        => 'required|min:3|max:255',
			'last_name'         => 'required|min:3|max:255',
			'email'             => 'required|email|max:255|unique:customers,email',
			'password'          => 'required|min:3|max:255',
			'repeat_password'   => 'required|same:password',
			'phone'             => 'required|min:3|max:255',
			'address'           => 'required|min:3|max:255',
			'country'           => 'required|min:3|max:255',
			'city'              => 'required|min:3|max:255',
			'postal_code'       => 'required|min:3|max:255',
		];
	}
}
