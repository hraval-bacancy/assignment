<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
            'first_name' => ['max:255'],
            'last_name' => ['max:255'],
            'phone' => ['max:10'],
            'company' => ['max:255'],
            'language' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'phone' => $input['phone'],
            'company' => $input['company'],
            'language' => $input['language'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
