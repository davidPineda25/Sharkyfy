<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'role';

    public $timestamps = false;

    protected $fillable = [
        'nameRole',
    ];

    protected $hidden = [];

    protected $casts = [];

    public function users(): HasMany
    {
        return $this->hasMany(UserModels::class, 'idRole', 'id'); 
    }
}