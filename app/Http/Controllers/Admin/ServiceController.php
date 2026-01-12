<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::ordered()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();

        // Convert textarea inputs to arrays
        if ($request->filled('features')) {
            $data['features'] = array_filter(array_map('trim', explode("\n", $request->features)));
        }
        if ($request->filled('benefits')) {
            $data['benefits'] = array_filter(array_map('trim', explode("\n", $request->benefits)));
        }
        if ($request->filled('requirements')) {
            $data['requirements'] = array_filter(array_map('trim', explode("\n", $request->requirements)));
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($data);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->validated();

        // Convert textarea inputs to arrays
        if ($request->filled('features')) {
            $data['features'] = array_filter(array_map('trim', explode("\n", $request->features)));
        }
        if ($request->filled('benefits')) {
            $data['benefits'] = array_filter(array_map('trim', explode("\n", $request->benefits)));
        }
        if ($request->filled('requirements')) {
            $data['requirements'] = array_filter(array_map('trim', explode("\n", $request->requirements)));
        }

        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy(Service $service)
    {
        // Delete image if exists
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan berhasil dihapus');
    }

    public function toggleStatus(Service $service)
    {
        $service->update(['is_active' => !$service->is_active]);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Status layanan berhasil diubah');
    }
}