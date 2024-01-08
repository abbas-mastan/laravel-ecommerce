<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'=> 'required|min:5',
            'price'=> 'required|max:10',
            'gender'=> 'required',
            'update'=> 'nullable',
            'image'=> 'required_if:update,no',
            'category'=> 'required',
            'description'=> 'required',
        ];
    }
}
