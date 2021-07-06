<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-x-6 sm:gap-y-6 sm:px-6 lg:px-8 py-6">
        <a href="{{ route('users.index') }}" class="w-full">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="px-8 py-6 bg-white border-b border-gray-200">                
                    <div class="text-2xl">{{ $usersCount }} usuários</div>
                
                    <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Visualizar</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                </div>
                
            </div>
        </a>
    </div>
</x-app-layout>
