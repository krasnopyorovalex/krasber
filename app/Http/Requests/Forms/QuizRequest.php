<?php

namespace App\Http\Requests\Forms;

use App\Http\Requests\Request;

/**
 * Class QuizRequest
 * @package App\Http\Requests\Forms
 */
class QuizRequest extends Request
{
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'name' => 'required|min:3|max:40|not_regex:/[^а-яА-ЯёЁ\s]/i',
            'phone' => 'string|nullable'
        ];
    }
}
