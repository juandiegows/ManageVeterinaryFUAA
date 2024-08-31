<div {{ $attributes }}>
    <div class="inline-flex w-full items-center">
        @if (isset($slot))
            <div class="flex">
                {{-- {{$slot}} --}}
                @isset($select)
                    {{ $select }}
                @endisset
            </div>
        @endif
        <div
            class="flex items-center bg-[#333333] hover:border-[#265A6F]
             border rounded-xl w-80 max-w-full shadow-sm ml-auto h-[42px]">
            <div class="pl-4">
                <svg class="fill-current text-gray-500 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path class="heroicon-ui"
                        d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42
                         1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                </svg>
            </div>
            <input wire:model.live="{{ $model }}"
                class="w-full border-0 bg-[#333333] text-white leading-tight
                 rounded-xl focus:outline-none focus:ring-0 py-3 px-4 h-9 "  name="unique-name"
                type="search" placeholder="Buscar" autocomplete="off"  >
        </div>

        @isset($button)
            {{ $button }}
        @endisset

    </div>
</div>
