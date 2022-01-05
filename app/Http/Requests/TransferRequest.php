<?php

namespace app\Http\Requests;

use App\Http\Requests\Request;

class TransferRequest extends Request
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
        //$input = $this->all();
        //$input['email'] = trim($input['email']);
        //$this->replace($input);

        return [
            'amount'                  => 'required',
            'bank'                 => 'required',
            'date'                 => 'required'
        ];
    }

    // public function specialRules() {
    //     if ($request->login == 'email' )
    //     {
    //         $this->rules['email'] = 'required|unique:users,email';
    //     } else if ($request->login == 'phone') {
    //         $this->rules['phone'] = 'required|numeric';
    //     }

    //     return $this;
    // }
}
