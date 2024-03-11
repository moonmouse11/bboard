<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function bbs(): HasMany
    {
        return $this->hasMany(Bb::class, 'category', 'title');
    }

    public function newBb(): HasOne
    {
        return $this->hasOne(Bb::class, 'category', 'title')
            ->ofMany('created_at');
    }

    public function offer(): HasManyThrough
    {
        return $this->hasManyThrough(Offer::class, Bb::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    protected function fullName()
    {
        return Attribute::make(
            get: fn ($value) => ($this->parent()) ?
                $this->parent()->name . ' - ' . $this->name : $this->name
        );
    }
}
