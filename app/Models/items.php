<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = [
        'item_name',
        'category',
        'desc',
        'photo',
        'price',
    ];

    public function orders() {
        return $this->hasMany(orders::class, 'item_id', 'id');
    }


    public function categories() {
        return $this->belongsTo(categories::class, 'category', 'id');
    }

}
