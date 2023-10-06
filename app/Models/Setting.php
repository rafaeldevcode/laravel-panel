<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_favicon',
        'site_bg_login',
        'site_logo_main',
        'site_description',
        'site_logo_secondary',
    ];
}
