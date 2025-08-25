<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $url
 */
class SaveLinkRequest extends FormRequest
{
    public function authorize(): true
    {
        return true;
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'url' => ['required', 'string'],
        ];
    }
}
