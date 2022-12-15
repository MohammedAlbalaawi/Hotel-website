<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'parent_id' => ['nullable', 'int', 'exists:categories,id'],
            'name' => [
                'required',
                'string', 'min:3',
                'max:255',
                Rule::unique('categories', 'name')->ignore(optional($this->model)->id),
                function ($attribute, $value, $fails) {
                    if (strtolower($value) == 'admin' || strtolower($value) == 'administrator') {
                        $fails('This name is forbidden');
                    }
                }
            ],
            'slug' => ['required'],
            'description' => ['required'],
            'image' => ['image', 'mimes:jpg,jpeg,png,gif,webp', 'dimensions:min_width-100,min_height-100'],
            'status' => ['required', 'in:active,archived'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name)
        ]);
    }
}
