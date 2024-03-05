<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
}
