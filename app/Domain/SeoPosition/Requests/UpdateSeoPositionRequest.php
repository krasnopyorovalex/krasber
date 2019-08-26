<?php

namespace Domain\SeoPosition\Requests;

use App\Http\Requests\Request;

/**
 * Class UpdateSeoPositionRequest
 * @package Domain\SeoPosition\Requests
 */
class UpdateSeoPositionRequest extends Request
{
    public function rules(): array
    {
        return [
            'domain' => 'bail|required|max:64',
            'image' => 'image',
            'imageAlt' => 'string|max:255',
            'imageTitle' => 'string|max:255'
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
            'name.required' => 'Поле «Название» обязательно для заполнения'
        ];
    }
}
