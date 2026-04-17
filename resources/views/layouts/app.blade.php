<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@2.0.18/dist/heroicons.min.js"></script>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-blue-600 text-white p-4 flex justify-between">
    <h1 class="font-bold">Todo App</h1>
    <div>
        <a href="/todos" class="mr-4 hover:underline">Home</a>
        <a href="/about" class="hover:underline">About</a>
    </div>
</nav>

<!-- Content -->
<div class="p-6">
    @yield('content')
</div>

</body>
</html>