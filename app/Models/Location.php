<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
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
            'latitude'  => 'double',
            'longitude' => 'double',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     ****************
     */

    /**
     * The model belongs to User.
     * @return BelongsTo<User, Location>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Model Belongs to City.
     * @return BelongsTo<City, Location>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
