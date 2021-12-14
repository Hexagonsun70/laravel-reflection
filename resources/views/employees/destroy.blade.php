<x-layout>
    <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl">
        <h1 class="text-green-500 text-4xl text-center pt-6">
            Employee <br> <span class="text-yellow-400">{{$employee->first_name}} {{ $employee->last_name }}</span> <br>
            <span class="bg-red-700 text-white rounded p-1">DELETED</span>
        </h1>

        <div class="py-6  text-yellow-400 flex flex-col text-xl w-full">
            <div class="flex flex-col pb-4 ">
                <span class="text-green-500 font-bold">Company:</span>
                <span>{{ucwords($companies[($employee->company_id - 1)]['name'])}}</span>
            </div>
            <div class="flex flex-col pb-4">
                <span class="text-green-500 font-bold">Email:</span>
                <span>{{ $employee->email }}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-green-500 font-bold">Phone Number:</span>
                <span>{{ $employee->phone_number }}</span>
            </div>
            <div class="flex justify-center pt-6 w-full">
                <form action="{{ route('employees.edit', $employee) }}">
                    <x-table.btn-e />
                </form>

                <form method="post" action="{{ route('employees.destroy', $employee) }}">
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-700 rounded text-white flex justify-center items-center p-2 w-9 my-1 h-9"
                            onclick="return confirm('Are you sure?')"
                    >
                        <i class="fas fa-trash-alt text-white"></i>
                    </button>
                </form>
            </div>
        </div>
</x-layout>
