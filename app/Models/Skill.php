<?php

namespace App\Models;

use App\Models\User;
use App\Models\YachtJob;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Belongs to many users
     * @return BelongsToMany<User, Certificate>
     */
    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }

    public function yachtJobs(): BelongsToMany {
        return $this->belongsToMany(YachtJob::class, 'job_skills');
    }
}
