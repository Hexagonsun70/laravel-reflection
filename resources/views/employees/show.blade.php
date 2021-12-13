<x-layout>
    <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl">
        <h1 class="text-green-500 text-4xl text-center pt-6">
            Employee <br> <span class="text-yellow-400">{{$employee->first_name}} {{ $employee->last_name }}</span>
        </h1>

        <div class="py-6 font-bold text-yellow-400 flex flex-col text-xl">
            <div class="flex flex-col pb-4">
            <span class="text-green-500">Company:</span>
            <span>{{ucwords($companies[($employee->company_id - 1)]['name'])}}</span>
            </div>
            <div class="flex flex-col pb-4">
            <span class="text-green-500">Email:</span>
            <span>{{ $employee->email }}</span>
            </div>
            <div class="flex flex-col">
            <span class="text-green-500">Phone Number:</span>
            <span>{{ $employee->phone_number }}</span>
            </div>
            <div class="flex justify-center pt-6">
                <form action="{{ route('employees.edit', $employee) }}">
                    <x-table.btn-e />
                </form>

                <form action="{{ route('employees.destroy', $employee) }}">
                    <x-table.btn-d />
                </form>
            </div>
        </div>
</x-layout>