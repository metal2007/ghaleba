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
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method() == 'post'){
            return [
            'title' =>'required|max:250',
            'description' =>'required|max:250',
            'body' =>'required',
            'images' =>'required| mimes:jpg,jpeg,png,bmp',
            'tags' =>'required',

            //
        ];
    }
        return [
            'title' => 'required|max:250',
            'description' => 'required',
            'body' => 'required',
            'images' => 'required|mimes:jpeg,png,bmp',
            'tags' => 'required',
        ];
    }
}
