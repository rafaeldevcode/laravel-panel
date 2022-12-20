<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $fillable = [
        'name',
        'icon',
        'slug',
        'position',
        'view_dashboard',
        'prefix',
        'belongs_to',
        'submenus'
    ];
}
