<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    //
    protected $table = 'orders';

    protected $fillable = [
        'order_number', 'user_id', 'status', 'grand_total', 'item_count', 'payment_status', 'payment_method',
        'first_name', 'last_name', 'address', 'city', 'country', 'phone_number', 'notes'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items() {
        return $this->hasMany(OrderItemModel::class);
    }
}