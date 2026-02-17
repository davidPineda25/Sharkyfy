<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductModels extends Model
{
    use HasFactory;

    protected $table =['product'];

    protected $fillable = [
        'sku',
        'title',
        'body',
        'price',
        'status',
        'stock'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
        'created_at' => 'datetime'
    ];

    public function categorys(): BelongsToMany
    {
        return $this->belongsToMany(CategoryModels::class, 'productCategory', 'idCategory', "idProduct");
    }

    public function OrderDetails(): HasMany
    {
        return $this->hasMany(OrderDetailsModels::class, 'idProduct', 'id');
    }
}