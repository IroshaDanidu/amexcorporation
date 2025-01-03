<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => ['required', 'string', 'in:Trainer,Employees,Administrations'],
            'phone_number' => ['required', 'string', 'max:15'], // Add this line
            'address' => ['required', 'string', 'max:255'], // Add this line
            'date_of_birth' => ['required', 'date'], // Add this line
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $input['role'],
            'phone_number' => $input['phone_number'], // Add this line
            'address' => $input['address'], // Add this line
            'date_of_birth' => $input['date_of_birth'], // Add this line
        ]);
    }
}
