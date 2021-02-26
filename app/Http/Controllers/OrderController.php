<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
        public function index(){
            $orders = Order::with(['customer.district.city.province'])
            ->withCount('return')
            ->orderBy('created_at', 'DESC');
        
        if (request()->q != '') {
            $orders = $orders->where(function($q) {
                $q->where('customer_name', 'LIKE', '%' . request()->q . '%')
                ->orWhere('invoice', 'LIKE', '%' . request()->q . '%')
                ->orWhere('customer_address', 'LIKE', '%' . request()->q . '%');
            });
        }

        if (request()->status != '') {
            $orders = $orders->where('status', request()->status);
        }
        $orders = $orders->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function destroy($id){
    $order = Order::find($id);
    $order->details()->delete();
    $order->payment()->delete();
    $order->delete();
    return redirect(route('orders.index'));
    }

    public function view($invoice){
    $order = Order::with(['customer.district.city.province', 'payment', 'details.product'])->where('invoice', $invoice)->first();
    return view('orders.view', compact('order'));
    }

    public function return($invoice){
        $order = Order::with(['return', 'customer'])->where('invoice', $invoice)->first();
        return view ('orders.return', compact('order'));
    }

    public function approveRun(Request $request){
        $this->validate($request, ['status'=>'required']);
        $order = Order::find($request->order_id);
        $order->return()->update(['status'=>$request->status]);
        $order->update(['status' => 4 ]);
        return redirect()->back();
    }
}
