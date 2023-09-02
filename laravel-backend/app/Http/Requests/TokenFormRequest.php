<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema()
 */
class TokenFormRequest extends FormRequest
{
    /**
     * @OA\Property(property="email", type="string", example="yaromiradmin@gmail.com"),
     * @OA\Property(property="password", type="string", example="yaromir228322"),
     */
    public function rules(): array
    {
        return [
            'email'    => ['required', 'string', 'max:255','email'],
            'password' => ['required', 'string', 'max:255']
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function bodyParameters()
    {
        return [
            'email' => [
                'description' => 'User email',
                'example' => 'yaromiradmin@gmail.com',
            ],
            'password' => [
                'description' => 'User password',
                'example' => 'yaromir228322',
            ],
        ];
    }
}
