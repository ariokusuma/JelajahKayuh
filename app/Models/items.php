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
    ];

    public function orders() {
        return $this->hasMany(orders::class, "item_id");
    }
}
