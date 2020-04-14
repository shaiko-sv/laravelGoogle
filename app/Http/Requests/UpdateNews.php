<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNews extends FormRequest
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
        $categoryList = (new Category())->getTable();
        return [
            'title' => 'required|min:5|max:20',
            'shortText' => 'required|min:10',
            'text' => 'required|min:15',
            'category_id' => "required|exists:{$categoryList},id",
            'image' => 'mimes:jpeg,bmp,png|max:1000',
            'isPrivate' => 'bool',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'News title',
            'shortText' =>'Short description',
            'text' => 'News\'s text',
            'category_id' => 'News category',
            'image' => 'Image',
            'isPrivate' => 'Private'
        ];
    }
}
