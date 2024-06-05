<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(Order $order) 
    {
        return view('payment.create', [
            'title' => 'Pay',
            'data' => [
                'order' => $order
            ]
        ]);
    }   

    public function store(Request $request, Order $order) 
    {
        $data = $request->validate(['proof_image' => ['required', 'image']]);
        $payment = new Payment([
            'trx_id' => str()->uuid(),
            'customer_id' => auth()->user()->id,
            'order_id' => $order->id,
            'amount' => $order->total_price,
        ]);
        
        if ($data['proof_image']) {
            $payment->proof_image_url = $data['proof_image']->storeAs('payments', uniqid('payment-') . '.jpg', 'public');
        }

        $payment->save();
        return to_route('order.index');
    }

    public function put(Request $request, Payment $payment) 
    {
        $data = $request->validate(['status' => ['required']]);

        $payment->status = $data['status'];
        $payment->order->status = $data['status'] == 'Success' 
            ? OrderStatus::ON_PROCESS->value
            : OrderStatus::APPROVED->value;

        $payment->order->save();
        $payment->save();

        return to_route('order.index')->with('message', 'Payment information updated successfully');
    }
}
