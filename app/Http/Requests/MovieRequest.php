<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'id_category' => 'required|array|min:1', 
            'id_category.*' => 'exists:categories,id',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'cast' => 'required|string',
            'director' => 'required|string',
            'release_year' => 'required|numeric',
            'country' => 'required|string',
            'views' => 'required|numeric',
            'film_duration' => 'required|numeric',
            'image' => 'required|array',
            'is_series' => 'required|in:0,1',
            'images.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
