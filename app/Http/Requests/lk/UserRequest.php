<?php

namespace App\Http\Requests\lk;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "fio"      => "required|string",
            "phone"    => "required|string|max:16|regex:/^\+7\([0-9]{3}\)[0-9]{3}-[0-9]{4}$/",
            "email"    => "email|unique:users",
            "password" => "max:50",
            "db_day"   => "required|max:2",
            "db_month" => "required|max:2",
            "db_year"  => "required|max:4",
            "gender"   => "required|integer",
        ];
    }
}
