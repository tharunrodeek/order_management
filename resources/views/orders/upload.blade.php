<!-- resources/views/orders/upload.blade.php -->

@extends('layouts.app')

@section('title', 'Upload Orders')

@section('content')
    <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">Upload Bulk Orders</h2>

    <form action="{{ route('orders.upload') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg">
        @csrf
        <div class="mb-6">
            <label for="file" class="block text-sm font-medium text-gray-700">Upload Orders (Excel)</label>
            <input type="file" name="file" id="file" accept=".xlsx, .xls" class="mt-2 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600" required>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
                Upload Orders
            </button>
        </div>
    </form>

@endsection
