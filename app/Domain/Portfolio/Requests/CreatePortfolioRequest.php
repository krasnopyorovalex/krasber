<?php

namespace Domain\Portfolio\Requests;

use App\Http\Requests\Request;

/**
 * Class CreatePortfolioRequest
 * @package Domain\Portfolio\Requests
 */
class CreatePortfolioRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|max:512',
            'form_title' => 'max:255|string|nullable',
            'form_sub_title' => 'max:512|string|nullable',
            'title' => 'required|string|max:512',
            'site_url' => 'string|nullable|max:64',
            'tags' => 'array|nullable',
            'color' => 'required|string|max:16',
            'category' => 'required|string|max:16',
            'description' => 'max:512|string',
            'preview' => 'required|string',
            'text' => 'required|string',
            'alias' => 'required|max:64|unique:portfolios',
            'image' => 'image',
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
            'title.required'  => 'Поле «Title» обязательно для заполнения',
            'color.required'  => 'Поле «Цвет фона» обязательно для заполнения',
            'text.required'  => 'Поле «Текст» обязательно для заполнения',
            'alias.required'  => 'Поле «Alias» обязательно для заполнения',
            'category.required'  => 'Поле «Категория» обязательно для заполнения',
            'alias.unique'  => 'Значение поля «Alias» уже присутствует в базе данных',
        ];
    }
}