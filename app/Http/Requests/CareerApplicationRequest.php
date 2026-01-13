<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'position_applied' => ['required', 'string', 'in:Security Guard,Cleaning Service,Driver'],
            'address' => ['required', 'string', 'max:1000'],
            'birth_date' => ['required', 'date', 'before:today'],
            'gender' => ['required', 'in:male,female'],
            'education_level' => ['required', 'string', 'max:100'],
            'cv' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
            'experience' => ['nullable', 'string', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.max' => 'Nama maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.max' => 'Nomor telepon maksimal 20 karakter.',
            'position_applied.required' => 'Posisi yang dilamar wajib dipilih.',
            'position_applied.in' => 'Posisi yang dipilih tidak valid.',
            'address.required' => 'Alamat lengkap wajib diisi.',
            'address.max' => 'Alamat maksimal 1000 karakter.',
            'birth_date.required' => 'Tanggal lahir wajib diisi.',
            'birth_date.date' => 'Format tanggal lahir tidak valid.',
            'birth_date.before' => 'Tanggal lahir harus sebelum hari ini.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'gender.in' => 'Jenis kelamin tidak valid.',
            'education_level.required' => 'Pendidikan terakhir wajib diisi.',
            'education_level.max' => 'Pendidikan terakhir maksimal 100 karakter.',
            'cv.file' => 'CV harus berupa file.',
            'cv.mimes' => 'CV harus berformat PDF, DOC, atau DOCX.',
            'cv.max' => 'Ukuran CV maksimal 2MB.',
            'photo.image' => 'Foto harus berupa gambar.',
            'photo.mimes' => 'Foto harus berformat JPG, JPEG, atau PNG.',
            'photo.max' => 'Ukuran foto maksimal 1MB.',
            'experience.max' => 'Pengalaman kerja maksimal 5000 karakter.',
        ];
    }
}