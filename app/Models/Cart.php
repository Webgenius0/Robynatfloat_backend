<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
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
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     ****************
     */

    /**
     * This model belongs to a User.
     * @return BelongsTo<User, Product>
     */
    public function use(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * This model belongs to a Product.
     * @return BelongsTo<Product, Cart>
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * This model belongs to a Service.
     * @return BelongsTo<Service, Cart>
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
