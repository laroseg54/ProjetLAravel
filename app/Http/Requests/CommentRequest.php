<?php

namespace App\Http\Requests;

use Symfony\Component\Console\Input\Input;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        
  
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required | max:1000',
            'post_id'=>'required',
            'user_id'=>'required',
            'parent_id' => 'nullable|numeric'
        ];
    }
}
