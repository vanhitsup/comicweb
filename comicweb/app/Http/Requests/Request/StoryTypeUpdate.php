<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class StoryTypeUpdate extends FormRequest
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
            'name'=>"required|unique:story_types,name".$this->post('id'),
            'description'=>'required',
            'action'=>'required',
            'slug'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Bạn vui lòng điền tên thể loại',
            'name.unique'=>'Tên thể loại bị trùng',
            'description'=>'Bạn vui lòng điển mô tả ',
            'action'=>'Bạn vui lòng chọn hành động',
            'slug'=>'Bạn chưa có Slug'
        ];
    }
}
