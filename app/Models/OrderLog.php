<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'action',
        'details',
    ];

    // Define the relationship to the Order model
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
