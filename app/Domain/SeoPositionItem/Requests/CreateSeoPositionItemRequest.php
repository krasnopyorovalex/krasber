<?php

namespace Domain\SeoPositionItem\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class CreateSeoPositionItemRequest
 * @package Domain\SeoPositionItem\Requests
 */
class CreateSeoPositionItemRequest extends Request
{
    public function rules(): array
    {
        return [
            'seo_position_id' => 'required|integer|exists:seo_positions,id',
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
            'seo_position_id.required' => 'Поле «Seo-позиция» обязательно для заполнения',
            'query.required' => 'Поле «Запрос» обязательно для заполнения',
            'value.required' => 'Поле «Позиция» обязательно для заполнения'
        ];
    }
}
