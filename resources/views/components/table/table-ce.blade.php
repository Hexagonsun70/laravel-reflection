<table class="bg-gray-700 rounded-xl table-width">
    <thead>
    <tr class=" text-yellow-400 p-4 tracking-wider">
        <th class="p-4 border-b border-r border-dashed">@sortablelink('first_name', 'First Name')</th>
        <th class="p-4 border-b border-r border-dashed">@sortablelink('last_name', 'Last Name')</th>
        <th class="p-4 border-b border-r border-dashed">@sortablelink('email')</th>
        <th class="p-4 border-b border-r border-dashed">Phone Number</th>
        <th class="p-4 border-b border-dashed"></th>
    </tr>
    </thead>
    <tbody class="pb-4 tracking-tight">

    {{ $slot }}

    </tbody>
</table>
