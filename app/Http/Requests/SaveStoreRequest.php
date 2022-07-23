<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveStoreRequest extends FormRequest
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
            'store_name' => "required|string|min:5|max:255|unique:stores,store_name",
            'email' => "nullable|unique:stores,email",
            'logo' => "nullable|file|image|mimes:jpeg,png,gif|dimensions:min_width=100,min_height=100|max:2048",
            'website' => "nullable|url",
        ];
    }

    public function sanitize()
    {
        $input = $this->all();
        $input['store_name'] = filter_var($input['store_name'], FILTER_SANITIZE_STRING);
        $input['email'] = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
        $input['website'] = filter_var($input['website'], FILTER_SANITIZE_URL);

        $this->replace($input);
    }
}
