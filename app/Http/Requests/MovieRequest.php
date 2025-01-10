<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'releaseDate' => 'required|date',
            'runtimeHours' => 'required|min:0',
            'runtimeMinutes' => 'required|min:0',
            'rating' => 'required|string',
            'genre' => 'required|string',
            'imdbRating' => 'required|numeric|min:1|max:10',
            'plot' => 'required|string',
            'director' => 'required|string',
            'actors' => 'required|string',
            'imdb_id' => 'required|string',
            'writer' => 'required|string',
            'image' => 'required|string',
        ];
    }
}
