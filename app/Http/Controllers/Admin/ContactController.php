<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query()->latest();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%");
            });
        }

        $contacts = $query->paginate(15);
        $unreadCount = Contact::unread()->count();
        $newCount = Contact::new()->count();

        return view('admin.contacts.index', compact('contacts', 'unreadCount', 'newCount'));
    }

    public function show(Contact $contact)
    {
        $contact->markAsRead();
        return view('admin.contacts.show', compact('contact'));
    }

    public function updateStatus(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:new,in_progress,completed,cancelled',
            'admin_notes' => 'nullable|string',
        ]);

        $contact->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return redirect()
            ->route('admin.contacts.show', $contact)
            ->with('success', 'Status berhasil diperbarui');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Pesan berhasil dihapus');
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:contacts,id',
        ]);

        Contact::whereIn('id', $request->ids)->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', count($request->ids) . ' pesan berhasil dihapus');
    }
}