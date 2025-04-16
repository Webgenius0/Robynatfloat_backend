<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'product_id',
        'subtotal',
        'shipping',
        'tax',
        'total',
    ];
    protected $casts = [
        'subtotal' => 'float',
        'shipping' => 'float',
        'tax' => 'float',
        'total' => 'float',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    //

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
