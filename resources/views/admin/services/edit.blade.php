@extends('layouts.admin')

@section('title', isset($service) ? 'Edit Layanan' : 'Tambah Layanan')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1 class="h3 mb-0">{{ isset($service) ? 'Edit Layanan' : 'Tambah Layanan' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Layanan</a></li>
                    <li class="breadcrumb-item active">{{ isset($service) ? 'Edit' : 'Tambah' }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($service))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Layanan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $service->title ?? '') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug (Opsional)</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $service->slug ?? '') }}">
                            <small class="text-muted">Kosongkan untuk generate otomatis dari judul</small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Security" {{ old('category', $service->category ?? '') == 'Security' ? 'selected' : '' }}>Security</option>
                                <option value="Cleaning" {{ old('category', $service->category ?? '') == 'Cleaning' ? 'selected' : '' }}>Cleaning</option>
                                <option value="Transportation" {{ old('category', $service->category ?? '') == 'Transportation' ? 'selected' : '' }}>Transportation</option>
                                <option value="Monitoring" {{ old('category', $service->category ?? '') == 'Monitoring' ? 'selected' : '' }}>Monitoring</option>
                                <option value="Technology" {{ old('category', $service->category ?? '') == 'Technology' ? 'selected' : '' }}>Technology</option>
                                <option value="Consulting" {{ old('category', $service->category ?? '') == 'Consulting' ? 'selected' : '' }}>Consulting</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon Emoji <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" value="{{ old('icon', $service->icon ?? '🛡️') }}" maxlength="10" required>
                            <small class="text-muted">Gunakan emoji untuk icon (contoh: 🛡️, 🧹, 🚗)</small>
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Singkat <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $service->description ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="full_description" class="form-label">Deskripsi Lengkap</label>
                            <textarea class="form-control @error('full_description') is-invalid @enderror" id="full_description" name="full_description" rows="5">{{ old('full_description', $service->full_description ?? '') }}</textarea>
                            @error('full_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Layanan</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, WEBP (Max: 2MB)</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if(isset($service) && $service->image)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="img-thumbnail" style="max-height: 200px;">
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="order" class="form-label">Urutan <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $service->order ?? 0) }}" min="0" required>
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price_label" class="form-label">Label Harga</label>
                            <input type="text" class="form-control @error('price_label') is-invalid @enderror" id="price_label" name="price_label" value="{{ old('price_label', $service->price_label ?? '') }}" placeholder="Contoh: Mulai dari Rp 3.5 Jt/bulan">
                            @error('price_label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price_start" class="form-label">Harga Mulai (Opsional)</label>
                            <input type="number" class="form-control @error('price_start') is-invalid @enderror" id="price_start" name="price_start" value="{{ old('price_start', $service->price_start ?? '') }}" step="0.01">
                            @error('price_start')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="features" class="form-label">Fitur Utama (satu per baris)</label>
                            <textarea class="form-control @error('features') is-invalid @enderror" id="features" name="features" rows="5" placeholder="Masukkan satu fitur per baris">{{ old('features', isset($service->features) ? implode("\n", $service->features) : '') }}</textarea>
                            <small class="text-muted">Pisahkan setiap fitur dengan enter/baris baru</small>
                            @error('features')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="benefits" class="form-label">Keunggulan Layanan (satu per baris)</label>
                            <textarea class="form-control @error('benefits') is-invalid @enderror" id="benefits" name="benefits" rows="5" placeholder="Masukkan satu keunggulan per baris">{{ old('benefits', isset($service->benefits) ? implode("\n", $service->benefits) : '') }}</textarea>
                            @error('benefits')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="requirements" class="form-label">Persyaratan (satu per baris)</label>
                            <textarea class="form-control @error('requirements') is-invalid @enderror" id="requirements" name="requirements" rows="5" placeholder="Masukkan satu persyaratan per baris">{{ old('requirements', isset($service->requirements) ? implode("\n", $service->requirements) : '') }}</textarea>
                            @error('requirements')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="process_description" class="form-label">Deskripsi Proses</label>
                            <textarea class="form-control @error('process_description') is-invalid @enderror" id="process_description" name="process_description" rows="4">{{ old('process_description', $service->process_description ?? '') }}</textarea>
                            @error('process_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="order" class="form-label">Urutan <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $service->order ?? 0) }}" min="0" required>
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Aktif
                            </label>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> {{ isset($service) ? 'Perbarui' : 'Simpan' }}
                            </button>
                            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h6 class="mb-0">Panduan</h6>
                </div>
                <div class="card-body">
                    <h6>Tips Pengisian:</h6>
                    <ul class="small">
                        <li>Judul harus jelas dan deskriptif</li>
                        <li>Slug akan di-generate otomatis jika dikosongkan</li>
                        <li>Gunakan emoji yang sesuai untuk icon</li>
                        <li>Deskripsi singkat untuk preview di homepage</li>
                        <li>Deskripsi lengkap untuk halaman detail</li>
                        <li>Urutan menentukan posisi tampilan (0 = paling atas)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection