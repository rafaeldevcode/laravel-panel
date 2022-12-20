<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationUser extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'notifications_user';

    protected $fillable = [
        'notifications_id',
        'user_id',
        'notification_status'
    ];
}
