<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'category', 'description', 'weight_gram',
        'purity', 'price', 'stock', 'image_url', 'is_active'
    ];

    protected function casts(): array
    {
        return ['weight_gram' => 'decimal:2', 'price' => 'decimal:2', 'is_active' => 'boolean'];
    }

    public function orderItems() { return $this->hasMany(OrderItem::class); }
}
