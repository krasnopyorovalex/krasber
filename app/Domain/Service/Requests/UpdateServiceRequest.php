<?php

namespace Domain\Service\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class UpdateServiceRequest
 * @package Domain\Service\Requests
 */
class UpdateServiceRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|max:512',
            'menu_name' => 'max:255|string|nullable',
            'parent_id' => 'numeric|exists:services,id|nullable',
            'title' => 'required|max:512',
            'description' => 'required|string|max:512',
            'slogan' => 'string|max:255|nullable',
            'title_block' => 'string|max:255|nullable',
            'text' => 'required|string',
            'is_published' => 'digits_between:0,1',
            'is_showed_dev_stages' => 'digits_between:0,1',
//            'is_showed_type_sites' => 'digits_between:0,1',
            'icon' => 'required|max:16|string|nullable',
            'pos' => 'integer|min:0|max:255',
            'price' => 'integer|min:0',
            'image' => 'image',
            'imageAlt' => 'string|max:255',
            'imageTitle' => 'string|max:255',
            'alias' => [
                'required',
                'max:64',
                Rule::unique('services')->ignore($this->id)
            ]
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