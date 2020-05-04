<?php

namespace App\Http\Requests\Forms;

use App\Http\Requests\Request;
use App\Rules\ServicesList;

/**
 * Class ContactRequest
 * @package App\Http\Requests\Forms
 */
class OrderServiceRequest extends Request
{
    public function rules(): array
    {
        return [
            'service' => ['required', 'string', new ServicesList],
            'name' => 'required|string|min:3|max:40',
            'phone' => 'required|string|min:5',
            'email' => 'required|email'
        ];
    }
}
