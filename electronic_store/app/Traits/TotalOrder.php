<?php

namespace App\Traits;

trait TotalOrder {
    public function getTotalOrder() {
        $carts = session()->get('cart');

        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['quantity'] * $cart['price'];
        }
        return $total;
    }

    public function getTotalQuantity() {
        $carts = session()->get('cart');
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['quantity'];
        }
        return $total;
    }
}
