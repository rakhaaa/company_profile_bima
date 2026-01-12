@extends('layouts.admin')

@section('title', 'Manajemen Layanan')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Manajemen Layanan</h1>
            <p class="text-muted">Kelola semua layanan perusahaan</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Layanan
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="50">Icon</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th width="100" class="text-center">Urutan</th>
                            <th width="100" class="text-center">Status</th>
                            <th width="200" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                        <tr>
                            <td class="text-center">
                                <span style="font-size: 2rem;">{{ $service->icon }}</span>
                            </td>
                            <td>
                                <strong>{{ $service->title }}</strong>
                                <br>
                                <small class="text-muted">{{ $service->slug }}</small>
                            </td>
                            <td>
                                <div style="max-width: 300px;">
                                    {{ Str::limit($service->description, 100) }}
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-secondary">{{ $service->order }}</span>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.services.toggle', $service) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $service->is_active ? 'btn-success' : 'btn-secondary' }}">
                                        {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </button>
                                </form>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-inbox" style="font-size: 3rem;"></i>
                                    <p class="mt-2">Belum ada layanan</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $services->links() }}
            </div>
        </div>
    </div>
</div>
@endsection