<?php

namespace App\Http\Requests\Forms;

use App\Http\Requests\Request;

/**
 * Class OrderConsultationRequest
 * @package App\Http\Requests\Forms
 */
class OrderConsultationRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:40|not_regex:/[^а-яА-ЯёЁ\s]/i',
            'email' => 'required|email',
            'phone' => 'required|string|min:5',
            'message' => 'string|nullable'
        ];
    }
}
