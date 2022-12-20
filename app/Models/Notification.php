<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'notification'
    ];

    /**
     * @return User
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
