<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_method',
        'stripe_payment_id',
        'currency',
        'amount',
        'status',
        'metadata',
    ];

    public function payable()
    {
        return $this->morphTo();
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
      public function user()
    {
        return $this->belongsTo(User::class);
    }
}
