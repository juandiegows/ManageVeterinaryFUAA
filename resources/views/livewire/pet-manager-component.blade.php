<div>
    <div class="w-full flex items-center justify-end my-5">
        <x-filter class="w-80" model="search" />
        <x-button class="mx-4" wire:click="showAdd">Agregar Mascota</x-button>
    </div>

    <div class="w-full h-full mb-2">
        <x-table :ths="['NOMBRE', 'TIPO MASCOTA', 'RAZA','GENERO','DUEÑO', 'FECHA DE CREACIÓN', 'ACCIONES']">
            <x-slot name="trs">
                @foreach ($pets as $pet)
                <tr class="text-[#f7f7f7] my-2 bg-[#1f2937]/40  text-center h-16 shadow-md shadow-[#000000]/5 hover:bg-[#c5c5c5]/40 font-normal text-[#393D40]">
                    <td class="text-left my-2 px-8 rounded-l-xl"> {{ $pet->name ?? '' }} </td>
                    <td class="text-center px-8"> {{ $pet->typePet->name ?? '' }}</td>
                    <td class="text-center px-8"> {{ $pet->breedPet->name ?? 'N/A' }} </td>
                    <td class="text-center px-8"> {{ $pet->genderPet->name ?? '' }} </td>
                    <td class="text-center px-8"> {{ $pet->user->name ?? '' }} </td>
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
                                    <x-dropdown-link wire:click="setPetForUpdate({{ $pet->id }})" class="cursor-pointer">
                                        <div class="flex items-center">
                                            <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16" fill="none">
                                                <path d="M12.8214 6.10714V12H3V2.17857H8.89286M5.75 7.67857L12.4286 1L14 2.57143L7.32143 9.25M5.75 7.67857L4.96429 10.0357L7.32143 9.25M5.75 7.67857L7.32143 9.25M10.8571 2.57143L12.4286 4.14286" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                            {{ __('Editar Mascota') }}
                                        </div>
                                    </x-dropdown-link>

                                    <x-dropdown-link wire:click="deleteUser({{ $pet->id }})" class="cursor-pointer">
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
                    @if (!isset($dataPet['id']))
                    <h3 class="text-2xl text-white">Crear Mascota</h3>
                    @else
                    <h3 class="text-2xl text-white">Actualizar Mascota</h3>
                    @endif
                </div>

                <div class="flex flex-wrap w-[95%] m-auto">
                    {{-- <div class="mb-3 w-full">
                        <x-label class="my-2">Foto de la Mascota</x-label>
                        <input type="file" wire:model="photo" class="px-2 py-2 border w-full text-white outline-none rounded-md bg-gray-900" />
                        @error('photo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Vista previa de la imagen seleccionada -->
                    @if ($photo)
                    <div class="mb-3 w-full">
                        <x-label class="my-2">Vista Previa</x-label>
                        <img src="{{ $photo->temporaryUrl() }}" alt="Vista previa de la foto de la mascota" class="rounded-md w-full h-auto" />
                    </div>
                    @endif --}}
                    <div class="mb-3 w-[48%]">
                        <x-label class="my-2">Nombre de la Mascota</x-label>
                        <x-input type="text" wire:model="dataPet.name" class="px-2 py-2 border w-full text-white outline-none rounded-md" placeholder="Ingresar el nombre" />
                        @error('dataPet.name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3 w-[48%] ml-[2%]">
                        <x-label class="my-2">Tipo de mascota</x-label>
                        <select wire:model.live="dataPet.type_pet_id" class="px-2 py-2 border w-full bg-gray-900 text-white outline-none rounded-md" placeholder="Seleccionar un tipo de mascota">
                            <option value="">Seleccionar tipo de mascota</option>
                            @foreach ($typePets as $typePetItem)
                            <option value="{{ $typePetItem['id'] }}">{{ $typePetItem['name'] }}</option>
                            @endforeach
                        </select>
                        @error('dataPet.type_pet_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3 w-[48%]">
                        <x-label class="my-2">Raza</x-label>
                        <select wire:model="dataPet.breed_pet_id" class="px-2 py-2 border w-full bg-gray-900 text-white outline-none rounded-md">
                            <option value="">Seleccionar Raza</option>
                            @foreach ($breeds as $breedItem)
                            <option value="{{ $breedItem['id'] }}">{{ $breedItem['name'] }}</option>
                            @endforeach
                        </select>
                        @error('dataPet.breed_pet_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3 w-[48%] ml-[2%]">
                        <x-label class="my-2">Genero</x-label>
                        <select wire:model="dataPet.gender_pet_id" class="px-2 py-2 border w-full bg-gray-900 text-white outline-none rounded-md">
                            <option value="">Seleccionar Genero</option>
                            @foreach ($genders as $genderItem)
                            <option value="{{ $genderItem['id'] }}">{{ $genderItem['name'] }}</option>
                            @endforeach
                        </select>
                        @error('dataPet.gender_pet_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 w-[48%]">
                        <x-label class="my-2">Color de la Mascota</x-label>
                        <x-input type="text" wire:model="dataPet.color" class="px-2 py-2 border w-full text-white outline-none rounded-md" placeholder="Ingresar el color" />
                        @error('dataPet.color')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3 w-[48%] ml-[2%]">
                        <x-label class="my-2">Fecha de nacimiento</x-label>
                        <div class="relative">
                            <input type="date" wire:model="dataPet.birth_date" class="px-2 py-2 border w-full text-white bg-gray-900 outline-none rounded-md appearance-none" placeholder="Ingresar el Fecha de nacimiento" />
                            <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <!-- Aquí puedes usar un ícono de calendario personalizado -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-6 8h6M5 7h14M5 11h14M5 15h14M5 19h14M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z" />
                                </svg>
                            </span>
                        </div>
                        @error('dataPet.birth_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-3 w-[48%]">
                        <x-label class="my-2">Dueño</x-label>
                        <select wire:model="dataPet.owner_id" class="px-2 py-2 border w-full bg-gray-900 text-white outline-none rounded-md">
                            <option value="">Seleccionar el dueño</option>
                            @foreach ($users as $userItem)
                            <option value="{{ $userItem['id'] }}">{{ $userItem['name'] }}</option>
                            @endforeach
                        </select>
                        @error('dataPet.owner_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-[95%] m-auto flex items-center justify-end my-5">
                    @if (!isset($dataPet['id']))
                    <x-button class="mx-4" wire:click="store">Guardar Mascota</x-button>
                    @else
                    <x-button class="mx-4" wire:click="update">Actualizar Mascota</x-button>
                    @endif
                </div>
            </x-modal>
        </template>
    </div>
</div>
