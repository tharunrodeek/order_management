<!-- resources/views/orders/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Edit Order</h2>

    <form action="{{ route('orders.update', $order->id) }}" method="POST" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Order Number -->
        <div class="mb-4">
            <label for="order_number" class="block text-sm font-medium text-gray-700">Order Number</label>
            <input type="text" name="order_number" id="order_number" value="{{ old('order_number', $order->order_number) }}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('order_number')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('description', $order->description) }}</textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Amount -->
        <div class="mb-4">
            <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
            <input type="number" name="amount" id="amount" value="{{ old('amount', $order->amount) }}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('amount')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Update Order</button>
        </div>
    </form>
@endsection
