<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('services', 'slug')->ignore($this->service),
            ],
            'icon' => 'required|string|max:10',
            'description' => 'required|string',
            'full_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul layanan wajib diisi',
            'title.max' => 'Judul layanan maksimal 255 karakter',
            'icon.required' => 'Icon layanan wajib diisi',
            'description.required' => 'Deskripsi singkat wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'order.required' => 'Urutan wajib diisi',
            'order.integer' => 'Urutan harus berupa angka',
        ];
    }
}