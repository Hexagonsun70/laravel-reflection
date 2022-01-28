{{--Company Headers--}}
{{--              :headers="['Email', 'Website', 'Logo',--}}
{{--              ['name' => '', 'border' => 'bottom']]"--}}

{{-- Employee Main --}}
{{--              :headers="['Company', 'First Name', 'Last Name', 'Email', 'Phone Number',--}}
{{--              ['name' => '', 'border' => 'bottom']]"--}}
{{-- Employee (Company Show) --}}
{{--              :headers="['First Name', 'Last Name', 'Email', 'Phone Number',--}}
{{--              ['name' => '', 'border' => 'bottom']]"--}}

<table class="bg-gray-700 rounded-xl">
    <thead>
        <tr class=" text-yellow-400 p-4 tracking-wider">
            @foreach($headers as $header)
                <th class="p-4 {{ $header['classes'] }} border-b border-dashed">
                    {{ $header['name'] }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody class="pb-4 tracking-tight">

        {{ $slot }}

    </tbody>
</table>
