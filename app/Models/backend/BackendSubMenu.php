<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BackendSubMenu extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'backend_submenu';
    protected $primaryKey = 'sub_menu_id';
    protected $fillable = [
         'backendmenu_id', 'menu_name', 'route_name', 'icon', 'has_submenu', 'permission_ids', 'visibility','sort_order'
    ];
}
