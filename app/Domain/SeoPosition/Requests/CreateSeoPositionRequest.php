<?php

namespace Domain\SeoPosition\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateSeoPositionRequest
 * @package Domain\SeoPosition\Requests
 */
class CreateSeoPositionRequest extends Request
{
    public function rules(): array
    {
        return [
            'domain' => 'required|max:64',
            'image' => 'image'
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
            'name.required' => 'Поле «Адрес сайта» обязательно для заполнения'
        ];
    }
}
