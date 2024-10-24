<?php

namespace App\Http\Requests;

use App\Const\Messages\ErrorMessages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CheckOtpRequest extends FormRequest
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
            'code'=>['required' ,"string","min:6","max:6"],
            'phoneNumber'=>['required', 'numeric', 'digits:10'],
            'password'=>['required',"min:8"],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        make_exception(ErrorMessages::getKey(ErrorMessages::$invalidData),422);
    }
}
