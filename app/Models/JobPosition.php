<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class JobPosition extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'description',
        'requirements',
        'location',
        'employment_type',
        'quota',
        'deadline',
        'is_active',
    ];

    protected $casts = [
        'requirements' => 'array',
        'deadline' => 'date',
        'is_active' => 'boolean',
        'quota' => 'integer',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($job) {
            if (empty($job->slug)) {
                $job->slug = Str::slug($job->title);
            }
        });
    }

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where(function($q) {
                $q->whereNull('deadline')
                  ->orWhere('deadline', '>=', now());
            });
    }

    public function isOpen(): bool
    {
        if (!$this->is_active) return false;
        if ($this->deadline && $this->deadline < now()) return false;
        return true;
    }

    public function getTypeLabel(): string
    {
        return match($this->type) {
            'security' => 'Security',
            'cleaning' => 'Cleaning Service',
            'driver' => 'Driver',
            'office' => 'Office Staff',
            default => 'Lainnya',
        };
    }
}

class JobApplication extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'job_position_id',
        'name',
        'email',
        'phone',
        'address',
        'birth_date',
        'gender',
        'education',
        'experience',
        'cv_file',
        'photo',
        'certificates',
        'status',
        'admin_notes',
        'reviewed_at',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'certificates' => 'array',
        'reviewed_at' => 'datetime',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function jobPosition()
    {
        return $this->belongsTo(JobPosition::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function getStatusBadgeClass(): string
    {
        return match($this->status) {
            'pending' => 'badge bg-warning',
            'reviewed' => 'badge bg-info',
            'interview' => 'badge bg-primary',
            'accepted' => 'badge bg-success',
            'rejected' => 'badge bg-danger',
            default => 'badge bg-secondary',
        };
    }

    public function getAge(): int
    {
        return $this->birth_date->age;
    }
}