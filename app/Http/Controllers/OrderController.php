<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller 
{
    public function index()
    {
        $orders = auth()->check()
            ? Order::where('customer_id', auth()->user()->id)->get()
            : Order::where('garment_id', auth()->guard('garment')->user()->id)->get();

        return view('order.index', [
            'title' => 'List Order',
            'data' => [
                'orders' => $orders
            ]
        ]);
    }

    public function show(Order $order) 
    {
        return view('order.show', [
            'title' => 'Order ' . $order->code,
            'data' => [
                'order' => $order
            ]
        ]);
    }

    public function create(Product $product)
    {
        return view('order.create', [
            'title' => 'Checkout Produk',
            'data' => [
                'product' => $product
            ]
        ]);
    }

    public function store(Product $product, Request $request) 
    {
        $data = $request->validate([
            'qty' => ['required', 'integer'],
            'note' => ['required']
        ]);

        $order = new Order([
            'customer_id' => (auth()->check() ? auth()->user() : auth()->guard('garment')->user())->id,
            'garment_id' => $product->garment->id,
            'code' => str()->uuid(),
            'total_qty' => (int) $data['qty'],
            'total_price' => ((int) $data['qty'] * $product->price),
            'note' => $data['note'],
            'status' => OrderStatus::PENDING->value
        ]);
        
        if ($order->save()) {
            $orderProduct = new OrderProduct([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'total_qty' => (int) $data['qty']
            ]);

            $orderProduct->save();

            return to_route('order.index')
                ->with('message', 'New order has been placed! Please check it.');
        }

        return back()
            ->with('message', 'Something went wrong!')
            ->withInput(['qty', 'note']);
    }

    public function update(Order $order, Request $request)
    {
        if (!auth()->guard('garment')->check() && $order->status !== OrderStatus::PENDING) {
            return back()
                ->with('message', "You can't update order that are not pending anymore!")
                ->withInput(['qty', 'note']);
        }

        if (auth()->check()) {
            $data = $request->validate([
                'qty' => ['required', 'integer'],
                'note' => ['required'],
            ]);
    
            $order->total_qty = $data['qty'];
            $order->note = $data['note'];
        }

        if (auth()->guard('garment')->check()) {
            $data = $request->validate([    
                'status' => ['required'],
                'price' => ['nullable']
            ]);

            $order->status = $data['status'];
            $order->total_price = $data['price'] ?? $order->total_price ?? 0;
        }

        if ($order->save()) {
            return to_route('order.index')
                ->with('message', 'Order successfully updated!');
        }

        return back()
            ->with('message', 'Failed to update! Something went wrong.')
            ->withInput(['qty', 'note']);
    }

    public function destroy(Order $order)
    {
        if ($order->status !== OrderStatus::PENDING) {
            return back()
                ->with('message', "You can't update order that are not pending anymore!")
                ->withInput(['qty', 'note']);
        }

        if ($order->delete()) {
            return back()
                ->with('message', 'That order successfully canceled!');
        }

        return back()
            ->with('message', 'Failed to cancel! Something went wrong.');
    }
}
