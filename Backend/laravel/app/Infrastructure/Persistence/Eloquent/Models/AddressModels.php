<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AddressModels extends Model{
    use HasFactory;

    protected $table = ['adress'];

    public $timestamps = false;

    protected $fillable = [
        'adress',
        'city',
        'country',
        'zipCode',
        'idUser'
    ];

    public function user():BelongsTo{
        return $this->belongsTo(UserModels::class, 'idUser', 'id');
    }
    public function orders():HasMany{
        return $this->hasMany(OrderModels::class, 'idOrder', 'id');
    }
}