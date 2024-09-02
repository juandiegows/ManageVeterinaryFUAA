<div>
    <div class="flex justify-between align-middle items-center">
        <select wire:model.live="filterCount" class="px-2 w-60 h-min border bg-gray-900 text-white outline-none rounded-md" placeholder="Seleccionar">
            <option value="10">10 registros</option>
            <option value="20">20 registros</option>
            <option value="50">50 registros</option>
            <option value="100">100 registros</option>
        </select>

        <div class="w-full flex items-center justify-end my-5">
            <x-filter class="w-80" model="search" />
            <x-button class="mx-4" wire:click="showAdd">Agregar Tipo de Mascota</x-button>
        </div>
    </div>

    <div class="w-full h-full mb-2">
        <div class="my-2">
            {{ $typePets->links() }}
        </div>

        <x-table :ths="['NOMBRE',  'FECHA DE CREACIÓN', 'ACCIONES']">
            <x-slot name="trs">
                @foreach ($typePets as $pet)
                <tr class="text-[#f7f7f7] my-2 bg-[#1f2937]/40  text-center h-16 shadow-md shadow-[#000000]/5 hover:bg-[#c5c5c5]/40 font-normal text-[#393D40]">
                    <td class="text-left my-2 px-8 rounded-l-xl"> {{ $pet->name ?? '' }} </td>
                    <td class="text-center px-8"> {{ $pet->created_at->format('d-m-Y') ?? '' }} </td>
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
            
                                    <x-dropdown-link wire:click="setTypePetForUpdate({{ $pet->id }})" class="cursor-pointer">
                                        <div class="flex items-center">
                                            <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16" fill="none">
                                                <path d="M12.8214 6.10714V12H3V2.17857H8.89286M5.75 7.67857L12.4286 1L14 2.57143L7.32143 9.25M5.75 7.67857L4.96429 10.0357L7.32143 9.25M5.75 7.67857L7.32143 9.25M10.8571 2.57143L12.4286 4.14286" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                            {{ __('Editar Tipo de Mascota') }}
                                        </div>
                                    </x-dropdown-link>

                                    <x-dropdown-link wire:click="deleteTypePet({{ $pet->id }})" class="cursor-pointer">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56 64">
                                                <defs>
                                                    <style>
                                                        .cls-1 {
                                                            fill: #ff2400;
                                                        }

                                                        .cls-2 {
                                                            fill: #ba1d08;
                                                        }

                                                    </style>
                                                </defs>
                                                <title>Trash Can</title>
                                                <g id="Layer_2" data-name="Layer 2">
                                                    <g id="Layer_1-2" data-name="Layer 1">
                                                        <path class="cls-1" d="M42.48,64h-29a6,6,0,0,1-6-5.5L4,16H52L48.46,58.5A6,6,0,0,1,42.48,64Z" />
                                                        <path class="cls-2" d="M52,8H38V6a6,6,0,0,0-6-6H24a6,6,0,0,0-6,6V8H4a4,4,0,0,0-4,4v4H56V12A4,4,0,0,0,52,8ZM22,6a2,2,0,0,1,2-2h8a2,2,0,0,1,2,2V8H22Z" />
                                                        <path class="cls-2" d="M28,58a2,2,0,0,1-2-2V24a2,2,0,0,1,4,0V56A2,2,0,0,1,28,58Z" />
                                                        <path class="cls-2" d="M38,58h-.13A2,2,0,0,1,36,55.88l2-32a2,2,0,1,1,4,.25l-2,32A2,2,0,0,1,38,58Z" />
                                                        <path class="cls-2" d="M18,58a2,2,0,0,1-2-1.87l-2-32a2,2,0,0,1,4-.25l2,32A2,2,0,0,1,18.13,58Z" />
                                                    </g>
                                                </g>
                                            </svg>
                                            {{ __('Eliminar tipo de mascota Mascota') }}
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

        <div class="my-2">
            {{ $typePets->links() }}
        </div>
    </div>

    <div x-data="{ modal: $wire.entangle('modalCreate') }">
        <template x-if="modal">
            <x-modal maxWidth="w60">
                <div @click="modal = false" class="w-10 h-10 z-50 top-3 right-3 shadow-md shadow-[#000000]/10 absolute bg-[#F1F5F9] hover:bg-[#F1F5F9]/90 rounded-full text-[#64748B] border border-[#E2E8F0] flex justify-center items-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-7 h-7">
                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                    </svg>
                </div>

                <div class="w-full m-auto p-10 space-y-5 relative">
                    @if (!isset($dataTypePet['id']))
                    <h3 class="text-2xl text-white">Crear tipo de mascota</h3>
                    @else
                    <h3 class="text-2xl text-white">Actualizar tipo de mascota</h3>
                    @endif
                </div>

                <div class="flex flex-wrap w-[95%] m-auto">
                    <div class="mb-3 w-[98%]">
                        <x-label class="my-2">Tipo de mascota</x-label>
                        <x-input type="text" wire:model="dataTypePet.name" class="px-2 py-2 border w-full text-white outline-none rounded-md" placeholder="Ingresar el nombre" />
                        @error('dataTypePet.name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                 

                </div>

                <div class="w-[95%] m-auto flex items-center justify-end my-5">
                    @if (!isset($dataTypePet['id']))
                    <x-button class="mx-4" wire:click="store">Guardar tipo de mascota</x-button>
                    @else
                    <x-button class="mx-4" wire:click="update">Actualizar tipo de mascota</x-button>
                    @endif
                </div>
            </x-modal>
        </template>
    </div>

    
<div x-data="{ modal: $wire.entangle('modalDelete') }">
    <template x-if="modal">
        <x-modal maxWidth="w60">
            <div @click="modal = false" class="w-10 h-10 z-50 top-3 right-3 shadow-md shadow-[#000000]/10 absolute bg-[#F1F5F9] hover:bg-[#F1F5F9]/90 rounded-full text-[#64748B] border border-[#E2E8F0] flex justify-center items-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-7 h-7">
                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                </svg>
            </div>

            <div class="w-full m-auto p-10 space-y-5 relative">
                <h3 class="text-2xl text-white">Eliminar el tipo de mascota</h3>
                <p class="text-white">¿está seguro que desea eliminar el tipo de mascota <b class="text-red-900">{{ $dataTypePet['name'] ?? '' }} </b>?</p>
            </div>


            <div class="w-[95%] m-auto flex items-center justify-end my-5">
                <x-button class="mx-4" wire:click="deleteTypePet({{ $dataTypePet['id'] ?? '' }}, true)">Eliminar Mascota</x-button>
            </div>
        </x-modal>
    </template>
</div>

</div>
