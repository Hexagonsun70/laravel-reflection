<x-layout>
    <section class="m-8 flex flex-col align-items">
        <div class="w-full flex justify-center align-items">
            <div>
                <div class="flex items-center">
                        <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i>
                            <a href="/">Dashboard</a> /
                            <a href="{{ route('companies.index') }}">Companies</a>
                        </span>
                </div>
                <div id="company-card"
                     class=" bg-gray-800 text-green-500 p-4 rounded-xl bg-auto w-96 flex flex-col items-center leading-none">
                    <div id="card-content" class="flex flex-col items-center justify-center">


                        <div id="card-details" class="flex flex-col justify-center ">
                            <h1 class="font-bold tracking-wide break-normal text-yellow-400 uppercase leading-none pb-4 text-2xl text-center">
                                {{ $company->name }} <br>
                            </h1>
                            <h2 class="font-bold tracking-wider text-green-400  text-xl">
                                Website:
                            </h2>
                            <span class="pb-4 text-yellow-400 text-xl">{{ $company->website }}</span>
                            <h2 class="font-bold tracking-wider text-green-400 text-xl">
                                Contact Details:
                            </h2>
                            <span class="pb-4 text-yellow-400 text-xl"> {{ $company->email }}</span>
                            <h2 class="font-bold tracking-wider text-green-400 text-xl">
                                Number of Employees:
                            </h2>
                            <span class="pb-4 text-yellow-400 text-xl">
                                {{ count($company->employees()->where('company_id', $company->id)->get())}}
                            </span>
                            <img src="{{ $company->logos }}"
                                 alt="{{ $company->name }} logo"
                                 class="h-80 w-full  rounded object-cover pt-4"
                            >
                            <div class="flex justify-center pt-6 px-4 w-full">
                                <form action="{{ route('companies.edit', $company) }}">
                                    <x-table.btn-e />
                                </form>

                                <form method="post" action="{{ route('companies.destroy', $company) }}">
                                    <x-table.btn-d-c />
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="container" class=" bg-gray-800 text-green-400 flex flex-col items-center h-auto p-4 rounded-xl mt-4">
            <h1 class="flex text-center text-2xl">Employees of&nbsp;
                <div class="text-yellow-400">{{ $company->name }}</div>
            </h1>
            <div id="table-container border border-white border-dashed"
                 class="pt-4"
            >
                <x-table.table :headers="[['name' => 'First Name', 'classes' => 'border-r border-dashed'],
                                          ['name' => 'Last Name', 'classes' => 'border-r border-dashed'],
                                          ['name' => 'Email', 'classes' => 'border-r border-dashed'],
                                          ['name' => 'Phone Number', 'classes' => 'border-r border-dashed'],
                                          ['name' => '', 'classes' => 'border-b border-dashed no-border-r']]">
                    @foreach($employees as $employee)
                        <tr class="pb-2 hover:bg-gray-800">
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
                <div class="flex justify-center">
                <a href="{{ route('employees.create', ['company' => $company]) }}"
                   class=" bg-green-600 hover:bg-green-700 text-white rounded justify-center flex
                   items-center justify-center py-2 px-4 w-auto transition-colors duration-[50ms] rounded-lg
                   focus:shadow-outline">
                    Add Employee
                </a>
                </div>

{{--                <form class="flex justify-center" action="{{ route('employees.create', $company) }}">--}}
{{--                    <button class="pt-8">--}}
{{--                        <div class="bg-green-600 hover:bg-green-700 text-white rounded w-auto--}}
{{--                        flex items-center justify-center py-2 px-4">--}}
{{--                            Add Employee--}}
{{--                        </div>--}}
{{--                    </button>--}}
{{--                </form>--}}

            </div>
        </div>
    </section>
</x-layout>
