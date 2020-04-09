<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cin' => 'required|min:6|max:10',
            'nom' => 'required|min:3|max:105',
            'prenom' => 'required|min:3|max:105',
            'adresse' => 'required|min:2|max:205',
            'ville' => 'required',
            'email' => 'required|email',
            'login' => 'required|min:8|max:45',
            'motdepasse' => 'string|required|alpha_num|between:6,50',
            'repeterMotdepasse' => 'required|same:motdepasse',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
