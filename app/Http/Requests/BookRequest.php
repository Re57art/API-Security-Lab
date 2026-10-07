<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'published_year' => ['required', 'integer', 'min:1', 'max:' . now()->year],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
