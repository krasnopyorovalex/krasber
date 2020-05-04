<?php

namespace Domain\Service\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateServiceRequest
 * @package Domain\Service\Requests
 */
class CreateServiceRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|max:512',
            'parent_id' => 'numeric|exists:services,id|nullable',
            'title' => 'required|max:512|string',
            'description' => 'required|string|max:512',
            'slogan' => 'string|max:255|nullable',
            'title_block' => 'string|max:255|nullable',
            'text' => 'required|string',
            'alias' => 'required|max:64|unique:services',
            'is_published' => 'digits_between:0,1',
            'is_showed_dev_stages' => 'digits_between:0,1',
//            'is_showed_type_sites' => 'digits_between:0,1',
            'pos' => 'integer|min:0|max:255',
            'price' => 'integer|min:0',
            'icon' => 'required|max:16|string|nullable',
            'menu_name' => 'max:255|string|nullable',
            'image' => 'image'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле «Название» обязательно для заполнения',
            'title.required'  => 'Поле «Title» обязательно для заполнения',
            'description.required'  => 'Поле «Description» обязательно для заполнения',
            'text.required'  => 'Поле «Текст» обязательно для заполнения',
            'alias.required'  => 'Поле «Alias» обязательно для заполнения',
            'alias.unique'  => 'Значение поля «Alias» уже присутствует в базе данных',
        ];
    }
}