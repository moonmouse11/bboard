<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**k
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    /**
     * Return all bb of the user
     *
     * @return HasMany
     */
    public function bbs(): HasMany
    {
        return $this->hasMany(Bb::class);
    }

    /**
     * Function to return the account
     *
     * @return HasOne
     */
    public function account(): HasOne
    {
        return $this->hasOne(Account::class);
    }

    /**
     * Return the name of the user
     *
     * @return Attribute
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => ucfirst($value),
            set: static fn ($value) => strtolower($value)
        );
    }

    /**
     * Return all spares of the user
     *
     * @return HasMany
     */
    public function spares(): HasMany
    {
        return $this->hasMany(Spare::class);
    }
}
