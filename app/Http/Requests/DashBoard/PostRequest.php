<?php

namespace App\Http\Requests\DashBoard;

use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Node\Stmt\Case_;

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
        switch ($this->method()) {
            case 'POST':
                return [
                    'category_id' => 'required',
                    'title' => 'required|max:255',
                    'image' => 'required|mimes:jpg,png,jpeg|max:2048'
                ];
                break;
            case 'PUT' :
                return [
                    'category_id' => 'required',
                    'title' => 'required|max:255',
                    'image' => 'mimes:jpg,png,jpeg|max:2048'
                ];
                break;
        }
    }

    public function attributes()
    {
        return [
            'category_id' => 'Dnah muc',
        ];
    }
}
