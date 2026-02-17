<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderDetailsModels extends Model{

    use HasFactory;

    protected $table =['orderDetail'];

    public $timestamps = false;

    protected $fillable = [
        'quantity',
        'price',
        'idOrder',
        'idProduct'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'price' => 'decimal:2',
    ];

    public function order():BelongsTo{
        return $this->belongsTo(ProductModels::class, 'idProduct', 'id');
    }

    public function payment() : HasOne {
        return $this->hasOne(PaymentModels::class, 'idOrderDetail', 'id');
    }
}