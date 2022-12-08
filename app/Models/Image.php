<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $connection = 'mysql_system';

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
