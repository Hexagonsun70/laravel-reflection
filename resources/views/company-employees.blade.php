<x-layout>
    <section class=" h-auto">
        <div id="container" class=" bg-gray-800 text-green-400 flex flex-col items-center h-auto p-4 rounded-xl m-8">
            <h1 class="flex text-center text-2xl">Employees of {{ $company }}</h1>
            <div id="table-container border border-white border-dashed    "
                 class="pt-4"
            >
                <x-table.table :headers="['First Name', 'Last Name', 'Email', 'Phone Number', ['name' => '', 'border' => 'bottom']]">
                    @foreach($employees as $employee)
                        <tr class="pb-2 hover:bg-gray-800">
                            <x-table.td>{{ $employee->first_name }}</x-table.td>
                            <x-table.td>{{ $employee->last_name }}</x-table.td>
                            <x-table.td>{{ $employee->email }}</x-table.td>
                            <x-table.td>{{ $employee->phone_number }}</x-table.td>
                            <td class="p-1 px-4 flex">
                                <form action="{{ route('companies.employees.show', $employee) }}">
                                    <x-table.btn-s />
                                </form>

                                <form action="{{ route('companies.employees.edit', $employee) }}">
                                    <x-table.btn-e />
                                </form>

                                <form action="{{ route('companies.employees.destroy', $employee) }}">
                                    <x-table.btn-d />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </x-table.table>

                <div class="flex justify-center ">
                    <a  href="add-employee" class="pt-8">
                        <button class="bg-green-600 text-white rounded w-auto flex items-center justify-center py-2 px-4">
                            Add Employee to {{ $company }}
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
