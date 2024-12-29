<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OrdersImport;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\OrderLog;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->paginate(10);
        // Pass the orders to the view
        return view('orders.index', compact('orders'));
    }

    public function uploadForm()
    {
        return view('orders.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        // Import the orders from the uploaded Excel file
        Excel::import(new OrdersImport(auth()->user()->id), $request->file('file'));
        // Log the new order details after updating
        OrderLog::create([
            'user_id' => auth()->id(),
            'action' => 'upload',
            'details' => 'New File Upload by User'.auth()->user()->id,
        ]);
        return redirect()->route('orders.index')->with('success', 'Orders uploaded successfully!');
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'order_number' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'numeric',
        ]);
        $order->update($validatedData);
        // Log the new order details after updating
        OrderLog::create([
            'user_id' => auth()->id(),
            'action' => 'update',
            'details' => 'Order Edited By : '.auth()->user()->id.' Order Id :'.$order->id,
        ]);
        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    public function destroy(Order $order)
    {
        OrderLog::create([
            'user_id' => auth()->id(),
            'action' => 'delete',
            'details' => 'Order Deleted By : '.auth()->user()->id.' Order ID :'.$order->id,
        ]);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
