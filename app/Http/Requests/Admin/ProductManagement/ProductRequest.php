<?php

namespace App\Http\Requests\Admin\ProductManagement;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg',
            'attribute_values' => 'nullable|array',
            'attribute_values.*' => 'nullable|string',
        ] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'slug' => 'required|string|unique:products,slug',
            'stock_no' => 'required|string|unique:products,stock_no',
        ];
    }
    protected function update(): array
    {
        return [
            'slug' => 'required|string|unique:products,slug,' . decrypt($this->route('product')),
            'stock_no' => 'required|string|unique:products,stock_no,' . decrypt($this->route('product')),
        ];
    }
}
