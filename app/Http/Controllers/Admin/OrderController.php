<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
//        return view("admins.index",[
//            'orders'=>Order::all(),
//            'statuses'=>Status::all(),
//        ]);
    }

    public function show(Order $order)
    {
//        dd($order->contents);
        return view("admins.orders.show",[
            'orderContent'=>$order->contents,
            'order_id'=>$order->id,
        ]);
    }

    //ф-ция на подтверждение заказа
    public function confirmation(Order $order)
    {
//        dd($order);
        $res = $order->update(['status_id'=>2]);

        return $res ? back()->with(['success' => 'Успешно подтвержден!']) :
            back()->withErrors(['error' => 'Не удалось обновить!']);
    }

    public function ordersFilter(Request $request)
    {
        $orders = Order::all();
//        dd($request->all());
        if ($request->status != 'all'){
            $orders = $orders->where('status_id', $request->status);
        }
//                dd($request->all() + [$orders]);
        return back()->withInput($request->all() + ['orders' => $orders]);
    }


    public function commentDelOrder(Order $order, Request $request)
    {
//        dd($request->all());

        $result = false;
        if ($request != '') {

            $order->update(['comment' => $request->comment]);

            $result = $order->update(['status_id' => 3]);

            foreach ($order->contents as $product)
            {
                $elem = Product::find($product->product_id);
                $elem->update(['count' => $elem->count + $product->amount]);
            }
        }

        return $result ? to_route('admin.main')->with(['success' => 'Заказ успешно отменен']) :
            to_route('admin.main')->withErrors(['error' => 'Не удалось отменить заказ']);
    }

    public function messageDelete(Order $order)
    {
        return view("admins.orders.delete",['order'=>$order]);
    }

}
