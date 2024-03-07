<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('todos.restoreAll') }}"
           class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Restore all</a>
        <a href="{{ route('todos.deleteAll') }}"
           class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Delete all</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-row gap-3">
            @if($todos->count() > 0)
                @foreach($todos as $todo)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg basis-1/4">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h3 class="font-semibold text-xl text-gray-800 leading-tight">{{ $todo->title }}</h3>
                            <p>{{ $todo->body }}</p>
                            <p class="mt-4 text-xs">Added at: {{ $todo->created_at->format('d/m/Y H:i:s') }}</p>
                            <p class="mt-4 text-xs">Done at: {{ $todo->deleted_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                            <div class="md:grid md:grid-cols-1 sm:px-2 lg:px-6 sm:my-2 lg:my-4">
                                <div class="md:col-span-1">
                                    <a href="{{ route('todos.restore', ['todo' => $todo->getKey()]) }}"
                                       class="inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Restore</a>
                                    <a href="{{ route('todos.delete', ['todo' => $todo->getKey()]) }}"
                                       class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Delete</a>
                                </div>
                            </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>