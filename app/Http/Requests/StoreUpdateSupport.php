<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupport extends FormRequest
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
            'sender' => 'required|min:10|max:255',
            'equipment_id' => 'required',
            'subject' => 'required|min:3|max:255',
            'body' => [
                'required',
                'min:3',
                'max:10000',
            ],
        ];

        return $rules;
    }
}
