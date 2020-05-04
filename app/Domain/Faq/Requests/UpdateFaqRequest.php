<?php

namespace Domain\Faq\Requests;

use App\Http\Requests\Request;

/**
 * Class UpdateFaqRequest
 * @package Domain\Faq\Requests
 */
class UpdateFaqRequest extends Request
{
    public function rules(): array
    {
        return [
            'question' => 'bail|required|string|max:512',
            'answer' => 'required|string'
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
            'question.required' => 'Поле «Вопрос» обязательно для заполнения',
            'answer.required'  => 'Поле «Ответ» обязательно для заполнения',
        ];
    }
}