<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCategoryModels extends Model{
    use HasFactory;

    protected $table=['productCategory'];

    public $timestamps = false;

    protected $fillable = [
        'idProduct',
        'idCategory'
    ];

    public function product():BelongsTo{
        return $this->belongsTo(ProductModels::class, 'idProduct', 'id');
    }
    public function category():BelongsTo{
        return $this->belongsTo(CategoryModels::class, 'idCategory', 'id');
    }
}