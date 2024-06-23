<?php

namespace App\Models\Posts\Details;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Machine extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    /**
     * Retrieves the spares associated with pivot object.
     *
     * @return BelongsToMany The spares associated with this object.
     */
    public function spares(): BelongsToMany
    {
        return $this->belongsToMany(Spare::class)->as('connector')
            ->withPivot('some_very_important_info')->withTimestamps();
    }
}
