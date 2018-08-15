<?php

namespace App\Http\Requests\Backend;

use App\Models\Label;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LabelRequest extends FormRequest
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
                    'name' => 'required|string|max:64',
                    'stage' => 'required|numeric|between:1,2',
                    'parent_id' => [
                        'required',
                        'numeric',
                        Rule::in(Label::where(['stage' => 1])->pluck('id')->toArray()),
                    ],
                    'nav_show' => 'nullable|numeric|between:1,2',
                ];
            default: {
                return [];
            }
        }
    }

    public function messages()
    {
        return [
            'name.required' => '请输入标签名',
            'source.max' => '标签名最多64个字符',
            'stage.required' => '请选择标签等级',
            'stage.between' => '等级只能是一级或者二级',
            'parent_id.required' => '请选择所属一级',
            'parent_id.numeric' => '所属一级id必须是数字',
            'parent_id.in' => '所属一级不存在',
            'nav_show.numeric' => '是否在导航展示必须是数字',
            'nav_show.between' => '是否在导航展示只可以是1/2',
        ];
    }
}
