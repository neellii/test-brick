<?php

namespace App\Http\Requests\Event;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => ['string', 'max:255'],
            'description' => ['string'], 
            'dateTime' => ['date_format:Y-m-d H:i:s'],
            'status' => ['required','in:1,0'],
            'categories' => ['required', 'array'],
            'categories.*' => Rule::in(Category::all()->pluck('id')->toArray())
        ];
    }
}
