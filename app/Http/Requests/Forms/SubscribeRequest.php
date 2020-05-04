<?php

namespace App\Http\Requests\Forms;

use App\Http\Requests\Request;

/**
 * Class SubscribeRequest
 * @package App\Http\Requests\Forms
 */
class SubscribeRequest extends Request
{
    public function rules(): array
    {
        return [
            'email' => 'required|email'
        ];
    }
}