<?php

namespace App\Http\Requests;

use App\Const\Messages\ErrorMessages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UserRegisterRequest extends FormRequest
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
            'password'=>['required',"min:8"],
            'firstName'=>['required', 'max:25', 'min:3', 'string'],
            'lastName'=> ['required', 'max:25', 'min:3', 'string'],
            'phoneNumber'=>['required', 'numeric', 'digits:10','unique:users'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        make_exception(ErrorMessages::getKey(ErrorMessages::$invalidData),422);
    }
}
