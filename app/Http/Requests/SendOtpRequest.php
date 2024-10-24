<?php

namespace App\Http\Requests;

use App\Const\Messages\ErrorMessages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class SendOtpRequest extends FormRequest
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
            'phoneNumber'=>['required', 'numeric', 'digits:10'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        make_exception(ErrorMessages::getKey(ErrorMessages::$invalidData),422);
    }
}
