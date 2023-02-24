<?php

namespace App\Http\Requests\Front\Registration;

use App\Http\Dto\User\UserDto;
use App\Http\Requests\Interfaces\GetDtoRequestInterface;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest implements GetDtoRequestInterface
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'phone' => ['required', 'string', 'unique:users,phone']
        ];
    }

    public function getDto(): UserDto
    {
        return new UserDto(
            $this->get('name'),
            $this->get('phone')
        );
    }
}
