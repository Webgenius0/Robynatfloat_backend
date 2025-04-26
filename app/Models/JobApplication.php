<?php

namespace App\Models;

use App\Models\User;
use App\Models\YachtJob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApplication extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'yacht_job_id',
        'user_id',
        'slug',
        'name',
        'phone_number',
        'email',
        'cv',
        'status',
    ];

    protected $casts = [
        'id'           => 'integer',
        'yacht_job_id' => 'integer',
        'user_id'      => 'integer',
        'slug'         => 'string',
        'name'         => 'string',
        'phone_number' => 'string',
        'email'        => 'string',
        'cv'           => 'string',
        'status'       => 'string',
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
        'deleted_at'   => 'datetime',
    ];

    public function getCvAttribute($url): string {
        if ($url) {
            if (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) {
                return $url;
            } else {
                return asset('storage/' . $url);
            }
        } else {
            return asset('assets/dev/image/avatar.jpg');
        }
    }

    public function getRouteKeyName(): string {
        return 'slug';
    }

    public function job(): BelongsTo {
        return $this->belongsTo(YachtJob::class, 'yacht_job_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function profile(): BelongsTo {
        return $this->belongsTo(profile::class, 'user_id');
    }
    public function role(): BelongsTo {
        return $this->belongsTo(Role::class, 'user_id');
    }
}
