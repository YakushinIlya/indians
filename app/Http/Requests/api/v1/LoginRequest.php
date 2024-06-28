<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "phone"    => "required|string|max:16|regex:/^\+7\([0-9]{3}\)[0-9]{3}-[0-9]{4}$/",
            "password" => "required|string|max:50",
        ];
    }
}
