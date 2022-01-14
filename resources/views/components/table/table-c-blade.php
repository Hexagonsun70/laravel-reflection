<table class="bg-gray-700 rounded-xl">
    <thead>
    <tr class=" text-yellow-400 p-4 tracking-wider">
        <th class="p-4 border-r border-dashed">@sortablelink('name')</th>
        <th class="p-4 border-r border-dashed">@sortablelink('name')</th>
        <th class="p-4 border-r border-dashed">@sortablelink('name')</th>
        <th class="p-4 border-b border-dashed">@sortablelink('name')</th>

    </tr>
    </thead>
    <tbody class="pb-4 tracking-tight">

    {{ $slot }}

    </tbody>
</table>
