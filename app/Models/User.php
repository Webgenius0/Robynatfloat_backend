<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Certificate;
use App\Models\Experience;
use App\Models\JobApplication;
use App\Models\Language;
use App\Models\Location;
use App\Models\OTP;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Skill;
use App\Models\YachtJob;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail {
    use HasFactory, Notifiable, SoftDeletes;

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
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'created_at'        => 'datetime',
            'updated_at'        => 'datetime',
        ];
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }

    /**
     * Get the avatar attribute.
     *
     * @param string|null $url The URL to be processed. Can be null or a string.
     *
     * @return string The processed URL. It may be modified or default to a fallback image.
     */
    public function getAvatarAttribute($url): string {
        if ($url) {
            if (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) {
                return $url;
            } else {
                return asset('storage/' . $url);
            }
        } else {
            return asset('assets/dev/image/avatar.jpg');
        }
    }

    /**
     * route key name change
     * @return string
     */
    public function getRouteKeyName(): string {
        return 'handle';
    }

    /**
     * ****************
     */

    /**
     * Define the relationship between the current model and the Profile model.
     *
     * This method defines a "has one" relationship, where the current model
     * has one associated Profile. The foreign key for this relationship is
     * expected to be present in the Profile model's table (typically `user_id`).
     *
     * @return HasOne
     */
    public function profile(): HasOne {
        return $this->hasOne(Profile::class);
    }

    /**
     * Define the relationship between the current model and the Otp model.
     *
     * This method defines a "has many" relationship, where the current model
     * can have multiple associated OTP (One-Time Password) entries. The foreign key
     * for this relationship is expected to be present in the Otp model's table
     * (typically `user_id` or a relevant identifier).
     *
     * @return HasMany
     */
    public function otps(): HasMany {
        return $this->hasMany(OTP::class);
    }

    /**
     * every user assign to a Role
     * @return BelongsTo<Role, User>
     */
    public function role(): BelongsTo {
        return $this->belongsTo(Role::class);
    }

    /**
     * This model may have multiple products
     * @return HasMany<Product, User>
     */
    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }

    /**
     * This model may have multiple products
     * @return HasMany<Service, User>
     */
    public function services(): HasMany {
        return $this->hasMany(Service::class);
    }

    /**
     * This model may have multiple carts
     * @return HasMany<Cart, Product>
     */
    public function carts(): HasMany {
        return $this->hasMany(Cart::class);
    }

    /**
     * This model may have multiple carts
     * @return HasMany<Experience, User>
     */
    public function experience(): HasMany {
        return $this->hasMany(Experience::class);
    }

    /**
     * Model may have many locations
     * @return HasMany<Location, City>
     */
    public function locations(): HasMany {
        return $this->hasMany(Location::class);
    }

    /**
     * belongs to many certificates
     * @return BelongsToMany<Certificate, User>
     */
    public function certificates(): BelongsToMany {
        return $this->belongsToMany(Certificate::class);
    }

    /**
     * belongs to many skills
     * @return BelongsToMany<Certificate, User>
     */
    public function skills(): BelongsToMany {
        return $this->belongsToMany(Skill::class);
    }

    /**
     * belongs to many languages
     * @return BelongsToMany<Language, User>
     */
    public function languages(): BelongsToMany {
        return $this->belongsToMany(Language::class);
    }

    /**
     * This model may have multiple yacht jobs
     * @return HasMany<YachtJob, User>
     */
    public function yachtJobs(): HasMany {
        return $this->hasMany(YachtJob::class);
    }

    /**
     * This model may have multiple yacht jobs
     * @return HasMany<YachtJob, User>
     */
    public function jobApplications(): HasMany {
        return $this->hasMany(JobApplication::class);
    }

   //message one to many
    public function messages(): HasMany {
        return $this->hasMany(Message::class);
    }
}
