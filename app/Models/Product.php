<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

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
    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'price' => 'float',
            'discount' => 'float',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     *******************
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
     * This model may have multiple carts
     * @return HasMany<Cart, Product>
     */
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
    /**
     * *********************
     */

    /**
     * Define a polymorphic one-to-many relationship with the Image model
     * Indicates that this model can have multiple associated images.
     * @return MorphMany<Image, Blog>
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function orders(): HasMany
{
    return $this->hasMany(Order::class, 'product_id');
}
}
