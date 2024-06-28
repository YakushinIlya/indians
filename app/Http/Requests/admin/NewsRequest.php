<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            "rubric"  => "required|integer",
            "title"   => "required|string",
            "slug"    => "string|nullable",
            "content" => "required|string",
            "image"   => "mimes:jpeg,jpg,png,gif|nullable",
        ];
    }
}
