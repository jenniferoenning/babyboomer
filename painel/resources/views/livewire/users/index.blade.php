<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Clients') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <input wire:model.debounce.500ms="search" type="text" name="search" id="search" placeholder="Pesquise" class="form-input rounded-md shadow-sm w-full">
                    
                    <div class="mt-3 overflow-x-auto bg-white rounded-lg border overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                            <thead>
                                <tr class="text-left">
                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        ID
                                    </th>
                                    
                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Nome
                                    </th>

                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        E-mail
                                    </th>

                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Criação
                                    </th>

                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="border-dashed border-t border-gray-200">
                                            <span class="text-gray-700 px-6 py-3 flex items-center">
                                                {{ $user->id }}
                                            </span>
                                        </td>
                                        
                                        <td class="border-dashed border-t border-gray-200">
                                            <span class="text-gray-700 px-6 py-3 flex items-center">
                                                {{ $user->name }}
                                            </span>
                                        </td>

                                        <td class="border-dashed border-t border-gray-200">
                                            <span class="text-gray-700 px-6 py-3 flex items-center">
                                                {{ $user->email }}
                                            </span>
                                        </td>

                                        <td class="border-dashed border-t border-gray-200">
                                            <span class="text-gray-700 px-6 py-3 flex items-center">
                                                {{ $user->formatted_created_at }}
                                            </span>
                                        </td>

                                        <td class="border-dashed border-t border-gray-200">
                                            <div class="inline-flex mr-2" role="group">
                                                <button wire:click="modalDeleteUser({{ $user->id }})" class="focus:outline-none text-white text-sm py-2.5 px-5 bg-{{ $user->trashed() ? 'blue' : 'red' }}-500 rounded-r-md hover:bg-{{ $user->trashed() ? 'blue' : 'red' }}-600 hover:shadow-lg">
                                                {{ $user->trashed() ? 'Desbloquear' : 'Bloquear' }}</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $users->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="confirmDialog">
        <x-slot name="title">
            Você tem certeza?        
        </x-slot>

        <x-slot name="content">
            @if($deletedUser)
            <p>ID: {{ $deletedUser->id }}</p>
            <p>Nome: {{ $deletedUser->name }}</p>

            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmDialog')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>
            
            <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                Bloquear
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
