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
        'payment_evidence',
        'status',
        'start_date',
        'end_date',
        'comments',
    ];

    public function item() {
        return $this->belongsTo(User::class);
    }
    public function user() {
        return $this->belongsTo(items::class);
    }
}
