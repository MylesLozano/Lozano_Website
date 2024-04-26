<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:255'],
            'middleName' => ['nullable', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobileNumber' => ['required', 'digits:11'],
            'password' => ['required', 'string', 'min:8', 'same:confirmPassword'],
        ]);
    }
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['firstName'],
            'middle_name' => $data['middleName'],
            'last_name' => $data['lastName'],
            'name' => $data['firstName'] . ' ' . $data['middleName'] . ' ' . $data['lastName'],
            'email' => $data['email'],
            'mobile_number' => $data['mobileNumber'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
