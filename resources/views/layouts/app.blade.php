<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Order Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @stack('styles') <!-- For additional styles if needed -->
</head>
<body class="bg-gray-100">

<!-- Header -->
<header class="bg-blue-600 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-xl font-semibold">Order Management</h1>
        <nav>
            <a href="{{ route('orders.index') }}" class="mr-4">Orders</a>
            <a href="{{ route('orders.uploadForm') }}" class="mr-4">Upload Orders</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn text-blue-500" style="    color: #fff;
    font-weight: bold;">Logout</button>
            </form>
        </nav>
    </div>
</header>

<!-- Main Content -->
<main class="container mx-auto p-4">
    @yield('content') <!-- Content will be injected here -->
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white p-4 mt-8" style="padding: 10px;
            text-align: center;
            position: absolute;
            width: 100%;
            bottom: 0;">
    <div class="container mx-auto text-center">
        <p>&copy; {{ date('Y') }} Order Management System. All rights reserved.</p>
    </div>
</footer>

@stack('scripts') <!-- For additional scripts if needed -->
</body>
</html>
