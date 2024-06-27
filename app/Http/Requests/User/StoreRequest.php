<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100'
            ],
            'email' => [
                'required',
                'email',
                'string',
                'min:3',
                'max:100',
                Rule::unique('users')
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'max:100',
                'confirmed'
            ],
        ];
    }
}