<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            //
            'title' => 'required',
            'price' => 'required',
            'body' => 'required|max:2000',

        ];
    }

    public function messages(){
      return [
        'title.required' => '商品名を入力してください',
        'price.required' => '商品名を入力してください',
        'body.required' => '商品の詳細を入力してください',
      ];
    }



}
