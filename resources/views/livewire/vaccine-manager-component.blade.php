<div>
    <div class="w-full flex items-center justify-end my-5">
        <x-filter class="w-80" model="search" />
        <x-button class="mx-4" wire:click="showAdd">Agregar Vacuna</x-button>
    </div>


    <div class="w-full h-full mb-2">
        <x-table :ths="['NOMBRE', 'DESCRIPCION', 'FECHA DE CREACIÓN', 'ACCIONES']">
            <x-slot name="trs">
                @foreach ($vaccines as $vaccine)
                <tr class="text-[#f7f7f7] my-2 bg-[#1f2937]/40  text-center h-16 shadow-md shadow-[#000000]/5 hover:bg-[#c5c5c5]/40 font-normal text-[#393D40]">
                    <td class="text-left my-2 px-8 rounded-l-xl"> {{ $vaccine->name ?? '' }} </td>
                    <td class="text-center px-8"> {{ $vaccine->description ?? '' }}</td>
                    <td class="text-center px-8"> {{ $vaccine->created_at->format('d-m-Y') ?? '' }} </td>
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
                                    <x-dropdown-link wire:click="setPetForUpdate({{ $vaccine->id }})" class="cursor-pointer">
                                        <div class="flex items-center">
                                            <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16" fill="none">
                                                <path d="M12.8214 6.10714V12H3V2.17857H8.89286M5.75 7.67857L12.4286 1L14 2.57143L7.32143 9.25M5.75 7.67857L4.96429 10.0357L7.32143 9.25M5.75 7.67857L7.32143 9.25M10.8571 2.57143L12.4286 4.14286" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                            {{ __('Editar Mascota') }}
                                        </div>
                                    </x-dropdown-link>

                                    <x-dropdown-link wire:click="deleteUser({{ $vaccine->id }})" class="cursor-pointer">
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



    <div x-data="{ modelCreate: $wire.entangle('modelCreate'), 
    preview: null  }">
        <template x-if="modelCreate">
            <x-modal maxWidth="w60">
                <div @click="modelCreate = false" class="w-10 h-10 z-50 top-3 right-3 shadow-md shadow-[#000000]/10 absolute bg-[#F1F5F9] hover:bg-[#F1F5F9]/90 rounded-full text-[#64748B] border border-[#E2E8F0] flex justify-center items-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-7 h-7">
                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                    </svg>
                </div>

                <div class="w-full m-auto p-10 space-y-5 relative">
                    @if (!isset($dataVaccine['id']))
                    <h3 class="text-2xl text-white">Crear vacuna</h3>
                    @else
                    <h3 class="text-2xl text-white">Actualizar vacuna</h3>
                    @endif
                </div>

                <div class="flex flex-wrap w-[95%] m-auto">

                    <div class="mb-3 w-full">
                        <x-label class="my-2">Nombre de la vacuna</x-label>
                        <x-input type="text" wire:model="dataVaccine.name" class="px-2 py-2 border w-full text-white outline-none rounded-md" placeholder="Ingresar el nombre" />
                        @error('dataVaccine.name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 w-full">
                        <x-label class="my-2">Descripcion</x-label>
                        <textarea wire:model="dataVaccine.description" class="px-2 py-2 border w-full text-white outline-none rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" placeholder="Ingresar la descripcion"> </textarea>
                        @error('dataVaccine.description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <h3 class="w-full text-lg text-white">Aplica para</h3>
                    <div class="flex flex-wrap gap-4 my-4">
                        @foreach ($typePets as $typePetItem)
                        <div class="flex gap-2">
                            <div class="inline-flex items-center">
                                <label class="relative flex cursor-pointer items-center rounded-full " for="type_{{ $typePetItem['id'] }}" data-ripple-dark="true">
                                    <input type="checkbox" @if(in_array($typePetItem['id'], $this->dataVaccine['typePets'])) checked @endif wire:click="toggleElement({{ $typePetItem['id'] }})" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-green-500 checked:bg-green-500 checked:before:bg-green-500 hover:before:opacity-10" id="type_{{ $typePetItem['id'] }}" />
                                    <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </label>
                            </div>
                            <label for="type_{{  $typePetItem['id']  }}" class="text-white mr-4"> {{ $typePetItem['name']  }}</label>
                        </div>

                        @endforeach
                    </div>
                    @error('dataVaccine.typePets')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-[95%] m-auto flex items-center justify-end my-5">
                    @if (!isset($dataVaccine['id']))
                    <x-button class="mx-4" wire:click="store">Guardar Vacuna</x-button>
                    @else
                    <x-button class="mx-4" wire:click="update">Actualizar Vacuna</x-button>
                    @endif
                </div>
            </x-modal>
        </template>
    </div>
</div>
