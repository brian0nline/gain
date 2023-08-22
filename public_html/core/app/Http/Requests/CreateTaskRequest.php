<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'requirements' => 'required|string|min:10',
            'countries' => 'required',
            'category' => 'sometimes|string',
            'numProof' => 'required|numeric|min:0',
            'maxWorkers' => 'required|numeric|min:0',
            'taskPerWorker' => 'required|numeric|min:0',
            'rateDays' => 'required|numeric|min:0',
            'speed' => 'required|numeric|min:0|max:100',
            'prize' => 'required|string',
            'maxProofRequire' => 'nullable|numeric|min:0',
            'requireUpload' => 'sometimes|numeric|min:0|max:1',
            'autoRate' => 'sometimes|numeric|min:0|max:1',
            'aq.question' => 'sometimes|string|min:0|max:225',
            'aq.answer' => 'sometimes|string|min:0|max:225',
        ];
    }

    public function messages()
    {
        return [
            //'required' => 'The field is required',
            'string' => 'The field has to be string',
            'numeric' => 'The field has to be number',
        ];
    }
}
