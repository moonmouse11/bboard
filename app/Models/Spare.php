<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spare extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function machines(): BelongsToMany
    {
        return $this->belongsToMany(Machine::class)->as('connector')
            ->withPivot('some_very_important_info')->withTimestamps();
    }

}
