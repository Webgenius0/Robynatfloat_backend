<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function plans()
{
    return $this->belongsToMany(Plan::class, 'plan_features')
                ->using(PlanFeature::class)
                ->withTimestamps();
}
}
