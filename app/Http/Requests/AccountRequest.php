<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class AccountRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
//        dd($this);
        if (empty($this->ID)){
            return [
//                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
                'ACCOUNT_NAME' => 'required|string|max:255|unique:accounts,ACCOUNT_NAME,'.$this->ID,
                'COUNTRY' => 'required',
                'ACCOUNT_EMAIL'=> 'required|string|max:255',
            ];
        }else{
            return [
                'ACCOUNT_NAME' => 'required|string|max:255|unique:accounts,ACCOUNT_NAME,'.$this->ID,
                'ACCOUNT_EMAIL'=> 'required|string|max:255',
                'COUNTRY' => 'required',
                'confirm_password' => 'same:password',
            ];
        }
    }
    public function messages(): array
    {
        return [
            'password' => 'Password is Required',
            'confirm_password' => 'Password confirmation failed',
            'ACCOUNT_NAME' => 'Name is Required',
            'ACCOUNT_NAME.unique' => 'This name already exist',
            'ACCOUNT_EMAIL'=> 'Email is Required',
            'COUNTRY'=> 'Country is Required',
        ];
    }
}
