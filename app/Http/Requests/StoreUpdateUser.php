<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUser extends FormRequest
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
        $rules = [
            'name' => 'required|min:3|max:255|unique:users',
            'admin' => 'required|min:1|max:1',
            'email' => [
                'required',
                'min:10',
                'max:255',
            ],
            'password' => [
                'required',
                'min:8',
            ],
            'password_confirm' => [
                'required',
                'min:8',
            ]
        ];
        if ($this->method() === 'PUT') {
            $rules['name'] = [
                'required',
                'min:10',
                'max:255',
                Rule::unique('users')->ignore($this->id),
            ];
            $rules['password'] = [
                'nullable',
                'min:8',
            ];
        }

        return $rules;
    }
}
