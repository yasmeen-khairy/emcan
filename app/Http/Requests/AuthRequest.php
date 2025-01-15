<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        if ($this->isMethod('post')) {
     
            if ($this->routeIs('register')) {     
                return [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email|max:255',
                    'password' => 'required|string|min:4|confirmed', 
                ];
            }

            if ($this->routeIs('login')) {
                return [
                    'email' => 'required|email|exists:users,email',
                    'password' => 'required|string|min:4',
                ];
            }
        }

        return [];
    }
}
