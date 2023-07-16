<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JobStoreRequest extends FormRequest
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
            'dateRange' => ['required', 'string', 'max:255'],
            'companyName' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'langs' => ['required', 'string', 'max:255'],
        ];
    }
}
