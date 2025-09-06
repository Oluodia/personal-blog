<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
        $postId = $this->input('id');

        return [
            'id' => 'required|exists:posts,id',
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts')->ignore($postId),
            ],
            'content' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'Такой заголовок уже существует',
        ];
    }
}
