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
        ];
    }
}
