<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionName extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'perm_id');
    }
}
