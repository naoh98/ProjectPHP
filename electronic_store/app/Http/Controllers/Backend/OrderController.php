<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = OrderModel::paginate(5);


        return view('backend.contents.orders.index', ['orders' => $orders]);

    }

    public function detail($order_id) {
        $order_items = OrderModel::find($order_id)->items;

        $product_id = $order_items->map(function ($item) {
            return $item->product_id;
        });
        $products = ProductModel::find($product_id);


        return view('backend.contents.orders.detail', ['order_items' => $order_items, 'products' => $products]);

    }
}
