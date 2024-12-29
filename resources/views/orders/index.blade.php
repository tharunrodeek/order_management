<!-- resources/views/orders/index.blade.php -->

@extends('layouts.app')

@section('title', 'Orders List')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Orders List</h2>

    <!-- Table for displaying orders -->
    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead>
        <tr>
            <th class="px-4 py-2 border-b">Order Number</th>
            <th class="px-4 py-2 border-b">Description</th>
            <th class="px-4 py-2 border-b">Amount</th>
            <th class="px-4 py-2 border-b">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td class="px-4 py-2 border-b">{{ $order->order_number }}</td>
                <td class="px-4 py-2 border-b">{{ $order->description }}</td>
                <td class="px-4 py-2 border-b">${{ $order->amount }}</td>
                <td class="px-4 py-2 border-b">
                    <a href="{{ route('orders.edit', $order->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                    |
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="delete-form" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn" style="color:red;">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function(e) {
            e.preventDefault();
            var confirmation = confirm("Are you sure you want to delete this order?");
            if (confirmation) {
                $(this).closest('form').submit();
            }
        });
    });
</script>
