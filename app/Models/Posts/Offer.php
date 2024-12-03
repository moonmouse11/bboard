<?php

declare(strict_types=1);

namespace App\Models\Posts;

use App\Models\Posts\Details\Spare;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Offer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected array $guarded = [];

    /**
     * Retrieve the associated user for the offer.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Retrieve the associated machine for the offer.
     *
     * @return BelongsTo
     */
    public function spares(): HasMany
    {
        return $this->hasMany(Spare::class);
    }
}
