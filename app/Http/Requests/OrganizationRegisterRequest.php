<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        return [

            // Organization
            'organization_name' => 'required|string|min:5|max:255',

            'registration_number' => 'required|string|max:100|unique:organizations',

            'organization_type' => 'required',

            'years_of_operation' => 'required|integer|min:0|max:200',

            'description' => 'nullable|string|max:1000',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            // Contact
            'email' => 'required|email|unique:users,email',

            'phone' => [
                'required',
                'regex:/^(98|97|96)\\d{8}$/'
            ],

            'website' => 'nullable|url',

            'address' => 'required|string|max:500',

            'province' => 'required',

            'district' => 'required',

            // Representative
            'representative_name' => 'required|string|max:255',

            'representative_position' => 'required|string|max:255',

            'representative_phone' => [
                'required',
                'regex:/^(98|97|96)\\d{8}$/'
            ],

            'representative_email' => 'required|email',

            // Documents
            'registration_certificate' =>
                'required|file|mimes:pdf,jpg,jpeg,png|max:5120',

            'pan_certificate' =>
                'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',

            'representative_id' =>
                'required|file|mimes:pdf,jpg,jpeg,png|max:5120',

            // Resources
            'capacity' => 'required|integer|min:1',

            // Login
            'password' =>
                'required|string|min:8|confirmed',
        ];
    }

    /**
     * Custom Error Messages
     */
    public function messages(): array
    {
        return [

            'phone.regex' =>
                'Phone number must be a valid Nepal mobile number.',

            'representative_phone.regex' =>
                'Representative phone number is invalid.',

            'registration_certificate.mimes' =>
                'Certificate must be PDF, JPG, JPEG or PNG.',

            'password.confirmed' =>
                'Password confirmation does not match.',
        ];
    }
}