<table class="bg-gray-700 rounded-xl">
    <thead>
        <tr class=" text-yellow-400 p-4 tracking-wider">
            @foreach($headers as $header)
                <th class="p-4 {{ $header['classes'] }} border-b border-dashed">
                    {{ $header['name'] }}
                </th>
            @endforeach
        {{--<th class="p-4 items-center border-b border-dashed mb-3"   colspan="2"></th>--}}
        </tr>
    </thead>
    <tbody class="pb-4 tracking-tight">

        {{ $slot }}

    </tbody>
</table>
