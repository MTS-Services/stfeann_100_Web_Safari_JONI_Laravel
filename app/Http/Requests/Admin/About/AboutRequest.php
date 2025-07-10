<?php

namespace App\Http\Requests\Admin\About;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'title' => 'string|required',
            'description' => 'string|required|min:700|max:880',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg',
            'our_mission' => 'string|required|min:280|max:340',
            'vission' => 'string|required|min:280|max:340',
            'sustainable_commitment' => 'string|required|min:340|max:500',
        ];
    }
}
