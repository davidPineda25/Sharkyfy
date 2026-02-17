<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentModels extends Model{
    use HasFactory;

    protected $table = ['payment'];

    public $timestamps = false;

    protected $fillable = [
        'codepay',
        'method',
        'status',
        'amount',
        'paid_at',
        'idOrderDetail'    
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime'
    ];

    public function ordeDetail():BelongsTo{
        return $this->belongsTo(OrderDetailsModels::class, 'idOrderDetail', 'id');
    }
}