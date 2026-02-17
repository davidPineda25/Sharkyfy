<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderModels extends Model
{
    protected $table =['order'];

    protected $fillable = [
        'status',
    ];

    protected $casts = [
        'dateorder' => 'datetime',
        'createAt' => 'datetime'
    ];

    public function orderDetails():HasMany{
        return $this->hasMany(OrderDetailsModels::class, 'idOrder', 'id');
    }
}