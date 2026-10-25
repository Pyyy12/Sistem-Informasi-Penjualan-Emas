<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'order_number', 'customer_name', 'phone', 'shipping_address',
        'subtotal', 'shipping_cost', 'total', 'payment_method', 'payment_status',
        'status', 'notes'
    ];

    protected function casts(): array
    {
        return ['subtotal' => 'decimal:2', 'shipping_cost' => 'decimal:2', 'total' => 'decimal:2'];
    }

    public function user() { return $this->belongsTo(User::class); }
    public function items() { return $this->hasMany(OrderItem::class); }
}
