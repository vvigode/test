<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller {
    
    public function orders(){
        return view('orders', [
            'orders' => Order::orderBy('created_at', 'asc')->get()
        ]);
    }

    public function neworder(Request $request) {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|max:11',
            'fio' => 'required|max:255',
            'summ' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $order = new Order;
        $order->phone = $request->phone;
        $order->fio = $request->fio;
        $order->summ = $request->summ;
        $order->address = $request->address;
        $order->save();
        return redirect('/');
    }

    public function editorder(Request $request) {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|max:11',
            'fio' => 'required|max:255',
            'summ' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $order = Order::where(["id" => $request->id])->get()->first();
        $order->phone = $request->phone;
        $order->fio = $request->fio;
        $order->summ = $request->summ;
        $order->address = $request->address;
        $order->update();
        return redirect('/');
    }

    public function deleteorder(Request $request) {
        $order = Order::where(["id" => $request->id])->get()->first();
        $order->delete();
        return redirect('/');
    }
}