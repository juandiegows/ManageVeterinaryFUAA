@props(['ths' => [], 'trs' => null, 'otherClass' => '', 'padding' => ''])
<div class="w-full overflow-x-auto scrollVerde h-auto {{ $otherClass }}">
    <table class="table-auto border-collapse w-full">
        <thead>
            <tr class="text-[#f7f7f7] bg-[#2b2b2b] h-16 text-[14px] text-center
             uppercase NunitoSemiBold shadow-md shadow-[#000000]/5 rounded-lg">
                @foreach ($ths as $th)
                    @if ($loop->first)
                        <th class="px-8 py-2 text-start rounded-l-lg whitespace-nowrap" scope>{{ $th }}</th>
                    @elseif($loop->last)
                        <th class="px-8 py-2 text-end rounded-r-lg whitespace-nowrap" scope>{{ $th }}</th>
                    @else
                        <th class="px-4 py-2 text-center whitespace-nowrap" scope>{{ $th }}</th>
                    @endif
                @endforeach
            </tr>

            <tr>
                <th class="py-2 {{ $padding }}" scope></th>
            </tr>
        </thead>
        <tbody class="text-[#f7f7f7] bg-[#2b2b2b] NunitoRegular normal-case">
            @if ($trs == null || ($trs == '' || empty($trs)))
                <tr class="text-[#f7f7f7] bg-[#2b2b2b] text-center">
                    <td colspan="{{ count($ths) }}" class="p-4 rounded-lg">
                        NO HAY REGISTROS
                    </td>
                </tr>
            @else
                {{ $trs }}
            @endif
        </tbody>
    </table>
</div>
