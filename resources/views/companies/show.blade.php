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

        <div id="container" class=" bg-gray-800 text-green-400 flex flex-col items-center h-auto p-4 rounded-xl mt-4 container-width">
            <div class="flex items-start w-full mr-4">
                <h1 class="flex text-2xl flex-grow justify-center">Employees of&nbsp;
                    <span class="text-yellow-400">{{ $company->name }}</span>
                </h1>
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
                <x-table.table-ce>
                    @foreach($employees as $employee)
                        <tr class="pb-2 hover:bg-gray-800">
                            <x-table.td>{{ $employee->first_name }}</x-table.td>
                            <x-table.td>{{ $employee->last_name }}</x-table.td>
                            <x-table.td>
                                <a href="mailto:{{$employee->email}}" class="underline">
                                    {{ $employee->email }}
                                </a>
                            </x-table.td>
                            <x-table.td>
                                <a href="tel:{{$employee->phone_number}}" class="underline">
                                    {{ $employee->phone_number }}
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
                </x-table.table-ce>
                @else
                    <p class="text-yellow-400 text-2xl uppercase">No employees found</p>
                @endif
                <div class="pt-4">
                    {!! $employees->appends(\Request::except('page'))->render() !!}
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
