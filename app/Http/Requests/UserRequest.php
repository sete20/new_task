<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Concerns\WithHashedPassword;

class UserRequest extends FormRequest
{
    use WithHashedPassword;
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
        if($this->isMethod('POST')){
            return [
                'email'=> 'required|email:rfc,dns|unique:users,email',
                'name'=>'required',
                'password'=>'required|min:6|confirmed'
            ];
           }else{
                return [
                'email' => "unique:users,email,$this->id,id",
                'name' => 'required',
                'password' => 'required|min:6|confirmed'
                ];
           }
    }
}
