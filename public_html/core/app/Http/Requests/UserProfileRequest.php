<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserProfileRequest extends FormRequest
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
        $address = array_values(request()->address);

        return [
            'username' => ['required', 'string', Rule::unique('users')->ignore(userInfo()->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore(userInfo()->id)],
            // 'firstname' => 'required|string|min:1|max:191',
            // 'lastname' => 'required|string|min:1|max:191',
            // 'address' => 'bail|nullable|array',
            'address.address1' => $address !== [null, null, null, null, null, null] ? 'required|string|min:2|max:191' : 'nullable',
            'address.city' => $address !== [null, null, null, null, null, null] ? 'required|string|min:2|max:191' : 'nullable',
            'address.zip' => $address !== [null, null, null, null, null, null] ? 'required|string|min:2|max:191' : 'nullable',
            'address.state' => $address !== [null, null, null, null, null, null] ? 'required|string|min:2|max:191' : 'nullable',
            'address.country' => $address !== [null, null, null, null, null, null] ? 'required|string|min:2|max:191' : 'nullable',
            'address.address2' => $address !== [null, null, null, null, null, null] ? 'bail|nullable|string|min:2|max:191' : 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'address.address1' => 'first address',
            'address.address2' => 'second address',
            'address.state' => 'state',
            'address.city' => 'city',
            'address.zip' => 'ZIP code',
            'address.country' => 'country',
        ];
    }
}
