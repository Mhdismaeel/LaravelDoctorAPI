<?php

namespace App\Http\Requests\AgentRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>['Required','String'],
            'email'=>['Required','Email'],
            'work'=>['Required','String'],
            'mobile'=>['Required','String'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];
    }
}
