<?php

namespace Domain\MenuItem\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateMenuItemRequest
 * @package Domain\MenuItem\Requests
 */
class CreateMenuItemRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|max:64',
            'link' => 'required|string|max:127',
            'menu_id' => 'required|numeric|exists:menus,id',
            'parent_id' => 'integer|exists:menu_items,id|nullable',
            'is_service' => 'string|min:1|max:1',
            'is_delimiter' => 'string|min:1|max:1',
            'pos' => 'integer|min:0|max:255'
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
            'link.required'  => 'Поле «Ссылка» обязательно для заполнения',
            'menu_id.required'  => 'Поле «Меню» обязательно для заполнения',
        ];
    }
}