<?php

namespace App\Actions\Fortify;

use App\Events\AuthenticationEvent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input): User
    {
        Validator::make($input, [
            'fname' => ['required', 'string', 'max:32'],
            'lname' => ['required', 'string', 'max:64'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'tel' => ['required', 'string', 'digits:11', Rule::unique(User::class)],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'fname' => $input['fname'],
            'lname' => $input['lname'],
            'email' => $input['email'],
            'address' => 'not defined',
            'tel' => $input['tel'],
            'slug' => Str::slug($input['fname'].' '.$input['lname']),
            'password' => Hash::make($input['password']),
        ]);

        event(new AuthenticationEvent($user));

        return $user;
    }
}
