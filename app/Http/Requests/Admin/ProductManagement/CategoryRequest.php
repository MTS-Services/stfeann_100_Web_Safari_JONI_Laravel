<?php

namespace App\Http\Requests\Admin\ProductManagement;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'name' => 'required|string|unique:categories,name',
            'slug' => 'required|string|unique:categories,slug',
        ];
    }
    protected function update(): array
    {
        return [
            'name' => 'required|string|unique:categories,name,' . decrypt($this->route('category')),
            'slug' => 'required|string|unique:categories,slug,' . decrypt($this->route('category')),
        ];
    }
}

