<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CategoryModels extends Model{

    use HasFactory;

    protected $table = ['Category'];

    protected $fillable = ['nameCategory'];

    public function products(): BelongsToMany{
        return $this->belongsToMany(ProductModels::class, 'productCategory', 'idCategory', 'idProduct');
    }
}