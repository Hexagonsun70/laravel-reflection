<x-layout>
{{--        <x-modal.edit-e />--}}
        <div class="m-8">

                <div class="flex items-center">
                    <span class="text-gray-800 text-xl p-2">
                        <i class="fas fa-angle-double-left"></i>
                        <a href="/">
                            Dashboard
                        </a>
                    </span>
                </div>

            <div id="container" class=" bg-gray-800 text-green-400 flex flex-col items-center h-auto p-4 rounded-xl ">
                <h1 class="flex text-center text-2xl">All Employees</h1>
                <div id="table-container border border-white border-dashed"
                     class="pt-4"
                >

                <x-table.table :headers="['Company', 'First Name', 'Last Name', 'Email', 'Phone Number',
                ['name' => '', 'border' => 'bottom']]">
                    @foreach($employees as $employee)
                        <tr class="pb-2 hover:bg-gray-800">
                            <x-table.td>{{ substr($employee->company()->pluck('name') , 2, -2) }}</x-table.td>
                            <x-table.td>{{ $employee->first_name }}</x-table.td>
                            <x-table.td>{{ $employee->last_name }}</x-table.td>
                            <x-table.td>{{ $employee->email }}</x-table.td>
                            <x-table.td>{{ $employee->phone_number }}</x-table.td>
                            <td class="p-1 px-4 flex">
                                <form action="{{ route('employees.show', $employee) }}">
                                    <x-table.btn-s />
                                </form>

                                <form action="{{ route('employees.edit', $employee) }}">
                                    <x-table.btn-e />
                                </form>

                                <form method="post" action="{{ route('employees.destroy', $employee) }}">
                                    <x-table.btn-d />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </x-table.table>

                <div class="pt-4">
                    {{ $employees->links() }}
                </div>

                <div class="flex justify-center ">
                    <a href="/employees/create" class="pt-8">
                        <div class="bg-green-600 text-white rounded w-auto
                        flex items-center justify-center py-2 px-4"
                        >
                            Add Employee
                        </div>
                    </a>
                </div>

                </div>
            </div>
        </div>
</x-layout>
