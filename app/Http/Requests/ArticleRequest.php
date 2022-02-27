<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return [
                'title' => 'required|string|max:20',
                'details' => 'required|string',
                'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category_id' => 'required|exists:categories,id'
            ];
        }else{
            return [
                'title' => 'required|string|max:20',
                'details' => 'required|string',
                'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }
    }
}
