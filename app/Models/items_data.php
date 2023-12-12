<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items_data extends Model
{
    use HasFactory;
    protected $table = 'items_data';
    protected $primaryKey = 'id';
    protected $fillable = [
        'item_name',
        'category',
        'desc',
        'photo',
    ];
}
