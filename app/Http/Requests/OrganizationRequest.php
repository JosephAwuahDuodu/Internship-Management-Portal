<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'org_name'=>'required|string',
            'primary_contact' => 'required|numeric',
            'email' => 'required|email',
            'other_contacts' => 'nullable|string',
            'post_office' => 'nullable|string',
            'city' => 'nullable|string',
            'region_id' => 'required|string',
            'industry_id' => 'required|string',
            'address' => 'nullable|string',
            'org_desc' => 'nullable|string',
        ];
    }
}
