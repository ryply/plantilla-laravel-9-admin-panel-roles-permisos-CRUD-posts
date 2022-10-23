<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function hasPermission($name): bool
    {
        return $this->permissions()->where('name', $name)->exists();
    }

    // Relaciones
    public function users()
    {
        // Un usuario puede tener mas de un role
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        // A un rol le pertenece uno o muchos permisos
        return $this->belongsToMany(Permission::class);
    }
}
