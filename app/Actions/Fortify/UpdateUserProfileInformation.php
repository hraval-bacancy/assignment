<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Crypt;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'first_name' => ['max:10'],
            'last_name' => ['max:10'],
            'phone' => ['max:10'],
            'company' => ['max:10'],
            'language' => ['required', 'string', 'max:10'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        $user->first_name = $input['first_name'] ? Crypt::encryptString($input['first_name']): '';
        $user->last_name = $input['last_name'] ? Crypt::encryptString($input['last_name']): '';
        $user->phone = $input['phone'] ? Crypt::encryptString($input['phone']): '';
        $user->company = $input['company'] ? Crypt::encryptString($input['company']): '';        

        $user->forceFill([            
            'email' => $input['email'],
        ])->save();
    }
}
