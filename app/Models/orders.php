<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'item_id',
        'user_id',
        'category',
        'payment_evidence',
        'status',
        'start_date',
        'end_date',
        'comments',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function item() {
        return $this->belongsTo(items::class, 'item_id', 'id');
    }
    public function categories() {
        return $this->belongsTo(categories::class, 'category', 'id');
    }

}
