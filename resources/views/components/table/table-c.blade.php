<table class="bg-gray-700 rounded-xl table-c">
    <thead>
    <tr class=" text-yellow-400 p-4 tracking-wider">
        <th class="p-4 border-b border-r border-dashed">@sortablelink('name')</th>
        <th class="p-4 border-b border-r border-dashed">@sortablelink('email')</th>
        <th class="p-4 border-b border-r border-dashed">@sortablelink('website')</th>
        <th class="border-b border-r border-dashed">Logo</th>
        <th class="p-4 border-b border-dashed"></th>

    </tr>
    </thead>
    <tbody class="pb-4 tracking-tight">

    {{ $slot }}

    </tbody>
</table>
