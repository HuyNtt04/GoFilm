<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionsRequest extends FormRequest
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
            'id_plan' => 'required|exists:subscriptions_plans,id',  
            'id_user' => 'required|exists:users,id',  
            'Start_date' => 'required|date|before_or_equal:End_date',  
            'End_date' => 'required|date|after:Start_date',  
            'Status' => 'required|in:active,inactive,expired',  
            'Payment_status' => 'required|in:0,1',
        ];
    }
}
