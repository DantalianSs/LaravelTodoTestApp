<x-app-layout>
    <x-slot name="header">
        <form method="GET" action="{{ route('admin-search') }}">
            <input type="text" name="searchRequest" placeholder="Search users name here...">
            </input type="submit">
            <a href="{{ route('admin-dashboard') }}"
               class="inline-flex justify-center rounded-md border border-transparent bg-green-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">All users</a>
        </form>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-row gap-3 flex-wrap-reverse">
                @foreach($users as $user)
                @if (! $user->is_admin)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg basis-64">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h3 class="font-semibold text-xl text-gray-800 leading-tight">{{ $user->name }}</h3>
                            <p>{{ $user->email }}</p>
                            <p>Account created at: {{ $user->created_at }}</p>
                            <p>{{ $user->todos->count() }} active ToDo's</p>
                            <p>{{ $user->todos()->onlyTrashed()->get()->count() }} done ToDo's</p>
                        </div>
                        <div method="POST" class="md:grid md:grid-cols-1 sm:px-2 lg:px-6 sm:my-2 lg:my-4">
                            <a href="{{ route('admin-check', ['user' => $user]) }}"
                               class="inline-flex justify-center rounded-md border border-transparent bg-orange-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Check</a>
                        </div>
                    </div>
                @endif
                @endforeach
        </div>
    </div>
</x-app-layout>
