<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CareerApplication extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'position_applied',
        'address',
        'birth_date',
        'gender',
        'education_level',
        'cv_path',
        'photo_path',
        'experience',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $appends = ['cv_url', 'photo_url', 'age'];

    public function getCvUrlAttribute()
    {
        return $this->cv_path ? Storage::url($this->cv_path) : null;
    }

    public function getPhotoUrlAttribute()
    {
        return $this->photo_path ? Storage::url($this->photo_path) : null;
    }

    public function getAgeAttribute()
    {
        return $this->birth_date ? $this->birth_date->age : null;
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeReviewing($query)
    {
        return $query->where('status', 'reviewing');
    }

    public function scopeShortlisted($query)
    {
        return $query->where('status', 'shortlisted');
    }

    public function scopeInterview($query)
    {
        return $query->where('status', 'interview');
    }

    public function scopeAccepted($query)
    {
        return $query->where('status', 'accepted');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function moveToReviewing()
    {
        $this->update(['status' => 'reviewing']);
    }

    public function shortlist()
    {
        $this->update(['status' => 'shortlisted']);
    }

    public function scheduleInterview()
    {
        $this->update(['status' => 'interview']);
    }

    public function accept()
    {
        $this->update(['status' => 'accepted']);
    }

    public function reject()
    {
        $this->update(['status' => 'rejected']);
    }
}