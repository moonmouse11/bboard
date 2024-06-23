<?php

namespace App\Models\Posts;

use App\Enums\BBType;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bb extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'title';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['title', 'content', 'price', 'user_id', 'type', 'category'];
    protected $casts = ['type' => BBType::class];

    public string $someProperty;

    /**
     * Retrieve the associated user for the bboard.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the category that bboard belongs to.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category', 'title');
    }
}
