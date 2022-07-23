<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
        $this->sanitize();
        return [
            'first_name' => "required|",
            'last_name' => "required|",
            'store_id' => "required|integer|min:1|exists:stores,id",
            'email' => "nullable|unique:employes,email",
            'phone_number' => "nullable|string|max:60",

        ];
    }

    public function sanitize()
    {
        $input = $this->all();
        $input['first_name'] = filter_var($input['first_name'], FILTER_SANITIZE_STRING);
        $input['last_name'] = filter_var($input['last_name'], FILTER_SANITIZE_STRING);
        $input['store_id'] = filter_var($input['store_id'], FILTER_SANITIZE_NUMBER_INT);
        $input['email'] = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
        $input['phone_number'] = filter_var($input['phone_number'], FILTER_SANITIZE_STRING);
        $this->replace($input);
    }
}
