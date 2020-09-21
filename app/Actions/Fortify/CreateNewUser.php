<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Crypt;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {        
        Validator::make($input, [
            'first_name' => ['max:10'],
            'last_name' => ['max:10'],
            'phone' => ['max:10'],
            'company' => ['max:10'],
            'language' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        $firstName = $input['first_name'] ? Crypt::encryptString($input['first_name']): '';
        $lastName = $input['last_name'] ? Crypt::encryptString($input['last_name']): '';
        $phone = $input['phone'] ? Crypt::encryptString($input['phone']): '';
        $company = $input['company'] ? Crypt::encryptString($input['company']): '';

        return User::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone' => $phone,
            'company' => $company,
            'language' => $input['language'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
