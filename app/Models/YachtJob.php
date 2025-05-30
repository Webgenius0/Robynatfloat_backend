<?php

namespace App\Models;

use App\Models\User;
use App\Models\Skill;
use App\Models\JobApplication;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class YachtJob extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'slug',
        'job_title',
        'job_category',
        'location',
        'employment_type',
        'application_deadline',
        'number_of_openings',
        'start_date',
        'end_date',
        'rate_amount_from',
        'rate_amount_to',
        'job_description',
        'status',
    ];

    protected $casts = [
        'id'                   => 'integer',
        'user_id'              => 'integer',
        'slug'                 => 'string',
        'job_title'            => 'string',
        'job_category'         => 'string',
        'location'             => 'string',
        'employment_type'      => 'string',
        'application_deadline' => 'datetime',
        'number_of_openings'   => 'integer',
        'start_date'           => 'datetime',
        'end_date'             => 'datetime',
        'rate_amount_from'     => 'decimal:2',
        'rate_amount_to'       => 'decimal:2',
        'job_description'      => 'string',
        'status'               => 'string',
        // 'created_at'           => 'datetime',
        // 'updated_at'           => 'datetime',
        'deleted_at'           => 'datetime',
    ];

    // protected $appends = ['timestamp'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(): string {
        return 'slug';
    }

    public function jobApplications(): HasMany {
        return $this->hasMany(JobApplication::class);
    }

    public function skills(): BelongsToMany {
        return $this->belongsToMany(Skill::class, 'job_skills');
    }


    public function getTimestampAttribute(): string {
        return $this->created_at ? $this->created_at->format('Y-m-d\TH:i:sP') . ' GMT+00:00' : 'N/A';
    }
}
