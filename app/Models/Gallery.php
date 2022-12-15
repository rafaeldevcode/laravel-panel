<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';

    protected $fillable = [
        'name',
        'image',
        'folder_name',
        'user_id'
    ];

    /**
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
