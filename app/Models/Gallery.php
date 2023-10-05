<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;

    public $table = 'gallery';

    protected $fillable = [
        'name',
        'file',
        'size',
        'type',
        'user_id',
        'protected',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
