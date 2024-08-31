<div>
    <div class="w-full flex items-center justify-end my-5">

        <x-filter class="w-80" model="search" />

    </div>

    <div class="w-full h-full mb-2">
        <x-table :ths="['NOMBRE', 'EMAIL', 'ROL', 'FECHA DE CREACIÓN', 'ACCIONES']">
            <x-slot name="trs">
                @foreach ($users as $user)
                <tr class="text-[#f7f7f7] my-2 bg-[#1f2937]/40  text-center h-16 shadow-md shadow-[#000000]/5 hover:bg-[#c5c5c5]/40 font-normal text-[#393D40]">
                    <td class="text-left my-2 px-8 rounded-l-xl"> {{ $user->name ?? '' }} </td>
                    <td class="text-center px-8"> {{ $user->email ?? '' }} </td>
                    <td class="text-center px-8"> {{ $user->role->name ?? 'N/A' }} </td>
                    <td class="text-center px-8"> {{ $user->created_at->format('d-m-Y') ?? '' }} </td>
                    <td class="rounded-r-xl px-8 w-1/12">
                        <div class="w-full flex justify-end items-center pr-4">
                            <x-dropdown position="absolute" align="left" width="80">
                                <x-slot name="trigger">
                                    <button class="flex justify-end items-center w-30 h-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                        </svg>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link wire:click="editUser({{ $user->id }})" class="cursor-pointer">
                                        <div class="flex items-center">
                                            <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16" fill="none">
                                                <path d="M12.8214 6.10714V12H3V2.17857H8.89286M5.75 7.67857L12.4286 1L14 2.57143L7.32143 9.25M5.75 7.67857L4.96429 10.0357L7.32143 9.25M5.75 7.67857L7.32143 9.25M10.8571 2.57143L12.4286 4.14286" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                            {{ __('Editar Usuario') }}
                                        </div>
                                    </x-dropdown-link>

                                    <x-dropdown-link wire:click="deleteUser({{ $user->id }})" class="cursor-pointer">
                                        <div class="flex items-center">
                                            <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16" fill="none">
                                                <path d="M14 11V15H2V11M8 2V12M8 12L4 8M8 12L12 8" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                            {{ __('Eliminar Usuario') }}
                                        </div>
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </td>
                </tr>
                @endforeach
            </x-slot>
        </x-table>
    </div>


</div>
