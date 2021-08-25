<?php

namespace App\Http\Requests;

use App\Rules\validateMultipleMobile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => ['required', 'max:255', new ValidateMultipleMobile],
            'organization_id' => 'required|exists:organizations,id',
            'email' => 'required|email|unique:contacts',
            'date_of_birth' => 'required|date',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $contact = $this->route()->parameter('contact');
            $rules['email'] = $rules['email'] . ",id,$contact->id";
        }

        return $rules;
    }
}
