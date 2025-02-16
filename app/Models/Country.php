<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
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
     *******************
     */

    /**
     * Model may have many states.
     * @return HasMany<State, Country>
     */
    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    /**
     * Model may have many cities.
     * @return HasMany<City, Country>
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
