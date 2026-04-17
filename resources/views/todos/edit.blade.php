@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">

    <h1 class="text-2xl font-bold mb-4 text-center">✏️ Edit Todo</h1>

    <form action="/todos/{{ $todo->id }}/update" method="POST">
        @csrf

        <!-- Validation -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-3 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Input -->
        <input type="text" name="task"
            value="{{ $todo->task }}"
            class="w-full border p-3 mb-4 rounded focus:ring-2 focus:ring-blue-400"
            required>

        <!-- Buttons -->
        <div class="flex justify-end space-x-2">

            <a href="/todos"
               class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                Cancel
            </a>

            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update
            </button>

        </div>

    </form>
</div>

@endsection