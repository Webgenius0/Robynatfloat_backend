<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
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
        'monthly_price',
        'full_price',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function features()
{
    return $this->belongsToMany(Feature::class, 'plan_features')
                ->using(PlanFeature::class)
                ->withTimestamps();
}

 public function payments()
    {
        return $this->morphMany(Payment::class, 'payable');
    }
}
