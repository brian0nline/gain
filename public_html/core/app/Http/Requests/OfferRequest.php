<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OfferRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'public_key' => request('is_builtin') ? 'required|string|max:191' : 'nullable',
            'publish_id' => request('publish_id') ? 'string|max:191' : 'nullable',
            'image' =>  request('image') || !request('is_builtin') ? 'required' : 'nullable',
            'iframe_url' => !request('is_builtin') ? 'required|string|max:191' : 'nullable',
            'endpoint' => !request('is_builtin') ? ['required', 'string', Rule::unique('offer_setups')->ignore(request('id'))] : 'nullable',
            'secret_key' => 'required|string|max:191',
            'response' => !request('is_builtin') ? 'required|string|max:191' : 'nullable',
            'user_ident' => !request('is_builtin') ? 'required|string|max:191' : 'nullable',
            'trx' =>  !request('is_builtin') ? 'required|string|max:191' : 'nullable',
            'amount' => !request('is_builtin') ? 'required|string|max:191' : 'nullable',
            'signature' => request('signature') ? 'string|max:191' : 'nullable',
            'signature_structure' => request('signature') ? 'required|string|max:191' : 'nullable',
            'server_ip' => request('server_ip') ? 'string|max:191' : 'nullable',
        ];
    }
}
