<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_name',
    ];

    public function items() {
        return $this->hasMany(items::class, 'category', 'id');
    }
    public function orders() {
        return $this->hasMany(orders::class, 'category', 'id');
    }

}
