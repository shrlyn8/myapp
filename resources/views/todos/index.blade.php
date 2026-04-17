@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">

    <!-- Header -->
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Todo List</h1>

        <a href="/todos/create"
           class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition transform hover:scale-105">
            ➕ Add Todo
        </a>
    </div>

    

    <!-- 🔍 SEARCH BAR WITH CLEAR BUTTON -->
    <form method="GET" action="/todos" class="mb-4 flex items-center gap-2">

        <input type="text" name="search"
            value="{{ request('search') }}"
            placeholder="Search task..."
            class="border p-2 rounded w-full">

        <!-- Search -->
        <button class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
            🔍
        </button>

        <!-- Clear -->
        @if(request('search'))
            <a href="/todos"
               class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
               ✖
            </a>
        @endif

    </form>

    <!-- Table -->
    <table class="w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">ID</th>
                <th class="p-2">Task</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach($todos as $todo)
            <tr class="border-t text-center hover:bg-gray-100 transition duration-200">
                <td class="p-2">{{ $todo->id }}</td>
                <td class="p-2">{{ $todo->task }}</td>
                <td class="p-2 space-x-2">
                <a href="/todos/{{ $todo->id }}/edit"
   class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
   ✏️ Edit
</a>

<a href="/todos/{{ $todo->id }}/delete"
   onclick="return confirm('Are you sure?')"
   class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
   🗑 Delete
</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection