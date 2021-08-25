<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrganizationRequest extends FormRequest
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
            'name' => 'required|max:255|unique:organizations',
            'category' => 'required|max:255',
            'trade_licence' => 'required|max:255',
            'logo' => 'required|file|max:10240',
            'licenced_date' => 'required',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $org = $this->route()->parameter('organization');
            $rules['name'] = $rules['name'] . ",id,$org->id";
            $rules['logo'] = "";
        }

        return $rules;
    }
}
