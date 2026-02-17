<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModels extends Model{
    use HasUuids;
    use HasFactory;

    protected $table = 'user';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'password',
        'email',
        'birthday',
        'phone',
        'imageProfile',
        'createAt'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'birthday' => 'date',
        'createAt' => 'datetime',
    ];

    public function role():BelongsTo
    {
        return $this->belongsTo(RoleModel::class, 'idRole', 'id');
    }
}

