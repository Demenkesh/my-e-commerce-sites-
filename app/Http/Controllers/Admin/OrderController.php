<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\InvoiceOrderMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '0')->paginate(4);
        return view('admin.orders.index', compact('orders'));;
    }
    public function view($id)
    {
        $orders = Order::where('id', $id)->first();
        return view('admin.orders.view', compact('orders'));
    }
    public function viewinvoice($id)
    {
        $orders = Order::where('id', $id)->first();

        return view('admin.invoice.generate-invoice', compact('orders'));
    }
    public function updateorder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('message', 'Order updated successfully.');
    }
    public function orderhistory()
    {
        $orders = Order::where('status', '1')->paginate(4);
        return view('admin.orders.history', compact('orders'));;
    }
    public function mailinvoice($id)
    {
        try{
            $orders = Order::where('id', $id)->first();
            Mail::to( "$orders->email")->send(new InvoiceOrderMailable($orders));

            return redirect('orders')->with('message', 'Mail successfully sent.'.$orders->email);
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}
