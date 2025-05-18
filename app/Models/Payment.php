<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   use HasFactory;

    protected $fillable = [
       'user_id', 'amount', 'currency', 'stripe_payment_intent_id', 'stripe_transfer_id', 'status',
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
