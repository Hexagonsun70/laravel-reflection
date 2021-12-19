<x-layout>
    <section class="login">
        <div class="flex items-center">
                <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i>
                    <a href="/">Dashboard</a> /
                    <a href="{{ route('employees.index') }}">Employees</a>
                </span>
        </div>
        <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl">
            <h1 class="text-green-500 text-4xl text-center pt-6">
                Employee <br> <span class="text-yellow-400">{{$employee->first_name}} {{ $employee->last_name }}</span>
            </h1>

            <div class="py-6  text-yellow-400 flex flex-col text-xl w-full">
                <div class="flex flex-col pb-4 ">
                    <span class="text-green-500 font-bold">Company:</span>
                    <span>{{ substr($employee->company()->pluck('name') , 2, -2) }}</span>
                </div>
                <div class="flex flex-col pb-4">
                    <span class="text-green-500 font-bold">Email:</span>
                    <span>{{ $employee->email }}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-green-500 font-bold">Phone Number:</span>
                    <span>{{ $employee->phone_number }}</span>
                </div>
                <div class="flex justify-center pt-6 px-4 w-full">
                    <form action="{{ route('employees.edit', $employee) }}">
                        <x-table.btn-e />
                    </form>

                    <form method="post" action="{{ route('employees.destroy', $employee) }}">
                        <x-table.btn-d />
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
