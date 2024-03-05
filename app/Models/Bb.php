<?php

namespace App\Models;

use App\Enums\BBType;
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category', 'title');
    }
}
