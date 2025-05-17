<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PlanFeature extends Pivot
{
    protected $table = 'plan_features';

    protected $fillable = ['plan_id', 'feature_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function feature()
    {
        return $this->belongsTo(Feature::class, 'feature_id');
    }
}
