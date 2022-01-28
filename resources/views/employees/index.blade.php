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

            <div id="container" class=" bg-gray-800 text-green-400 flex flex-col items-center h-auto p-4 rounded-xl container-width">
                <div class="flex items-start w-full mr-4">
                    <h1 class="flex text-center text-2xl justify-center flex-grow">All Employees</h1>
                    <div class="">
                        <form action="" method="get" class="flex">
                            <div>
                                <x-input id="search"
                                         class="w-64 bg-gray-700 p-2 rounded-lg
                                             placeholder-green-500 placeholder-opacity-90"
                                         type="text"
                                         name="search"
                                         :value="request('search')"
                                         placeholder="Search..."
                                />
                            </div>
                            <button class="text-white rounded-lg bg-indigo-600 ml-2 w-10">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div id="table-container border border-white border-dashed"
                     class="pt-4"
                >
                @if($employees[0])
                <x-table.table-e class="table-width">
                    @foreach($employees as $employee)
                        <tr class="pb-2 hover:bg-gray-800">

                            <x-table.td>{{ $employee->first_name }}</x-table.td>
                            <x-table.td>{{ $employee->last_name }}</x-table.td>
                            <x-table.td>
                                <a href="mailto:{{$employee->email}}" class="underline">{{ $employee->email }}</a>
                            </x-table.td>
                            <x-table.td>
                                <a href="tel:{{$employee->phone_number}}" class="underline">{{ $employee->phone_number }}</a>
                            </x-table.td>
                            <x-table.td>
                                <a class="underline"
                                   href=" {{route('companies.show', $employee->company) }}">
                                    {{ $employee->company->name }}
                                </a>
                            </x-table.td>
                            <td class="p-1 px-4 flex justify-center">
                                <form action="{{ route('employees.show', $employee) }}">
                                    <x-table.btn-s />
                                </form>

                                <form action="{{ route('employees.edit', $employee) }}">
                                    <x-table.btn-e />
                                </form>

                                <div x-data="{open: false}">
                                    <x-modal.e-del :employee="$employee"/>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-table.table-e>
                @else
                    <p class="text-yellow-400 text-2xl uppercase">No employees found</p>
                @endif

                <div class="pt-4">
                    {!! $employees->appends(\Request::except('page'))->render() !!}
                </div>

                <div class="flex justify-center ">
                    <a href="/employees/create" class="pt-4">
                        <div class="bg-green-600 hover:bg-green-700 text-white rounded w-auto
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
