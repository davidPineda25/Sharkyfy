<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentsModels extends Model{

    use HasFactory;

    protected $table=['comments'];
    protected $fillable = [
        'body',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(UserModels::class, 'idUser', 'id');
    }
    public function product():BelongsTo{
        return $this->belongsTo(ProductModels::class, 'idProduct', 'id');
    }
}