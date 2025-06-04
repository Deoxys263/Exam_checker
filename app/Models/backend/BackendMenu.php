<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BackendMenu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'backendmenu';
    protected $primaryKey  = 'backendmenu_id';
    protected $fillable = [
       'backendmenu_id', 'menu_name', 'route_name', 'icon', 'has_submenu', 'visibility','permission_ids','sort_order'
    ];
}
