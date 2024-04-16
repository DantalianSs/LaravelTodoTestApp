<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-row gap-3 flex-wrap">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg basis-64">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibolcd text-xl text-gray-800 leading-tight">{{ $user->name }}</h3>
                    <p>{{ $user->email }}</p>
                </div>
                <div class="md:grid md:grid-cols-1 sm:px-2 lg:px-6 sm:my-2 lg:my-4">
                    <a href="{{ route('admin-dashboard') }}"
                       class="inline-flex justify-center rounded-md border border-transparent bg-green-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Return</a>
                </div>
            </div>
            @if($todos->count() > 0)
                @foreach($todos as $todo)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg basis-64">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h3 class="font-semibold text-xl text-gray-800 leading-tight">{{ $todo->title }}</h3>
                            <p>{{ $todo->body }}</p>
                            <p class="mt-4 text-xs">Added at: {{ $todo->created_at->format('d/m/Y H:i:s') }}</p>
                            @if($todo->deleted_at)
                                <p class="mt-4 text-xs">Done at: {{ $todo->deleted_at->format('d/m/Y H:i:s') }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
