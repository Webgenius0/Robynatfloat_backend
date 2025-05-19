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
        'plan_name',
        'plan_price',
        'plan_full_price',
        'description',
        'slug',
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
