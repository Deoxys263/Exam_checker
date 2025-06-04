<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActionPermission extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'action_permission';
    protected $primaryKey = 'action_permission_id';

    protected $fillable = ['action_permission_name'];
}
