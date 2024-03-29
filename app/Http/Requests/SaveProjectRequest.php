<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class SaveProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'       => 'required',
            'url'         => [
                'required',
                Rule::unique('projects')->ignore($this->route('project')),
            ],
            'category_id' => [
                'required',
                'exists:categories,id'
            ],
            'image' => [
                $this->route('project') ? 'nullable' : 'required',
                'mimes:jpeg,png',
            ],
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "El proyecto necesita un título",
        ];
    }
}
