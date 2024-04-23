<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends ApiRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:32',
            'surname' => 'required|string|min:1|max:32',
            'patronymic' => 'string|min:1|max:32|nullable',
            'phone_number' => 'required|string|min:6|max:12|unique',
            'birth' => 'required|date',
            'login' => 'required|string|min:5|max:32',
            'password' => 'required|string|min:8|max:32',
            'email' => 'required|email|min:5|max:32|unique',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения.',
            'name.max' => 'Поле "Имя" должно содержать не более :max символов.',
            'name.min' => 'Поле "Имя" должно содержать не менее :min символов.',

            'surname.required' => 'Поле "Фамилия" обязательно для заполнения.',
            'surname.min' => 'Поле "Фамилия" должно содержать не менее :min символов.',
            'surname.max' => 'Поле "Фамилия" должно содержать не менее :max символов.',

            'patronymic.min' => 'Поле "Отчество" должно содержать не менее :min символов.',
            'patronymic.max' => 'Поле "Отчество" должно содержать не менее :max символов.',

            'phone_number.required' => 'Поле "Телефон" обязательно для заполнения.',
            'phone_number.digits_between' => 'Поле "Телефон" должно содержать от :min до :max цифр.',
            'phone_number.unique' => 'Такой "Телефон" уже существует.',

            'login.required' => 'Поле "Логин" обязательно для заполнения.',
            'login.min' => 'Поле "Логин" должно содержать не менее :min символов.',
            'login.max' => 'Поле "Логин" должно содержать не более :max символов.',

            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.min' => 'Поле "Пароль" должно содержать не менее :min символов.',
            'password.max' => 'Поле "Пароль" должно содержать не более :max символов.',

            'email.required' => 'Поле "Электронная почта" обязательно для заполнения.',
            'email.email' => 'Поле "Электронная почта" должно быть действительным адресом электронной почты.',
            'email.min' => 'Поле "email" должно содержать не менее :min символов.',
            'email.max' => 'Поле "Электронная почта" должно содержать не более :max символов.',
            'email.unique' => 'Такая "Электронная почта" уже существует.',
        ];
    }
}
