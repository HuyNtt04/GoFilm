<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlsRequest extends FormRequest
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
            'url' => ['required', 'url', 'max:65535'], // text nhưng có thể giới hạn nếu muốn
            'server_name' => ['required', 'string', 'max:50'],
            'resolution' => ['required', 'in:360p,480p,720p,1080p,4K'],
        ];
    }
}
