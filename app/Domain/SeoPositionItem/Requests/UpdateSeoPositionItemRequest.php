<?php

namespace Domain\SeoPositionItem\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class UpdateSeoPositionItemRequest
 * @package Domain\SeoPositionItem\Requests
 */
class UpdateSeoPositionItemRequest extends Request
{
    public function rules(): array
    {
        return [
            'query' => 'required|string',
            'se' => Rule::in(['yandex','google']),
            'value' => 'required|integer'
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
            'query.required' => 'Поле «Запрос» обязательно для заполнения',
            'value.required' => 'Поле «Позиция» обязательно для заполнения'
        ];
    }
}
