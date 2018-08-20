<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
        switch ($this->route()->getActionMethod()) {
            case 'store':
            case 'update':
                return [
                    'title'=> 'required|string|min:6|max:125',
                    'file'=> 'required|string|max:255',
                    'sort'=> 'required|numeric',
                    'url'=> 'nullable|url',
                ];
            default: {
                return [];
            }
        }
    }

    public function messages()
    {
        return [
            'title.required' => '请输入标题',
            'title.min' => '标题最少六个字符',
            'title.max' => '标题不可超过125个字符',
            'file.required' => '请上传缩略图',
            'file.max' => '文件名最多255个字符',
            'sort.required' => '请输入排序数字',
            'sort' => '排序必须是整形数字',
            'url.url' => '跳转链接必须是url格式',
        ];
    }
}
