<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class YachtJob extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
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
        'created_at'           => 'datetime',
        'updated_at'           => 'datetime',
        'deleted_at'           => 'datetime',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
