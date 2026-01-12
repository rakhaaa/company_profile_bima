<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'service_type',
        'message',
        'status',
        'admin_notes',
        'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function markAsRead()
    {
        $this->update(['read_at' => now()]);
    }

    public function getServiceTypeLabel(): string
    {
        return match($this->service_type) {
            'security' => 'Security Guard',
            'cleaning' => 'Cleaning Service',
            'driver' => 'Driver Service',
            'patrol' => 'Patrol & Monitoring',
            'cctv' => 'CCTV & Security System',
            'consulting' => 'Security Consulting',
            default => 'Lainnya',
        };
    }

    public function getStatusBadgeClass(): string
    {
        return match($this->status) {
            'new' => 'badge bg-primary',
            'in_progress' => 'badge bg-warning',
            'completed' => 'badge bg-success',
            'cancelled' => 'badge bg-danger',
            default => 'badge bg-secondary',
        };
    }
}