<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShortSetupRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:191',
            'url' => 'required|url|min:2|max:191',
            'api' => 'required|url|min:2|max:191',
            'count_per_day' => 'required|numeric|min:0|max:191',
            'rewards' => 'required|string|min:1|max:191',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Please, Fill required field',
            'count_per_day.numeric' => 'Daily limit per IP is numbers only',
        ];
    }
}
