<?php

namespace App\Http\Requests\Backend;

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
        switch ($this->route()->getActionMethod()) {
            case 'store':
            case 'update':
                return [
                    'title' => 'required|string|min:6|max:125',
                    'source' => 'nullable|string|max:32',
                    'banner' => 'nullable|string|max:125',
                    'brief' => 'required|string|max:125|min:6',
                    'sort' => 'nullable|numeric',
                    'content' => 'required|string',
                ];
            default: {
                return [];
            }
        }
    }

    public function messages()
    {
        return [
            'title.required' => '请输入文章标题',
            'title.min' => '文章标题最少六个字符',
            'title.max' => '文章标题不可超过125个字符',
            'source.max' => '来源描述最多32个字符',
            'banner.required' => '请上传缩略图',
            'banner.max' => '缩略图文件名最多125个字符',
            'brief.required' => '请输入文章简述',
            'brief.min' => '文章简述最少6个字符',
            'brief.max' => '文章简述最最多125个字符',
            'sort' => '排序必须是整形数字',
            'content.required' => '请输入文章内容',
        ];
    }
}
