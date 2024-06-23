<?php

namespace App\Models\Posts;

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

    protected mixed $name;

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

    /**
     * Return slave categories.
     *
     * @return HasMany
     */
    public function categories(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * Return the parent category
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Return the full name of the category with parent categories.
     *
     * @return Attribute
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ($this->parent()) ?
                $this->parent()->name . ' - ' . $this->name : $this->name
        );
    }
}
