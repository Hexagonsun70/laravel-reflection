<x-layout>
    <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl">
    <h1 class="text-green-500 text-4xl text-center pt-6">
        Edit Employee <span class="text-yellow-400">{{$employee->first_name}} {{ $employee->last_name }}</span>
    </h1>

    <div class="py-6 font-bold text-green-500">
        <form method="UPDATE" action="" class="flex flex-col">
            @csrf
            <label for="company_id"
                   class="pb-2"
            >
                Company Id:
            </label>

            <input type="company_id"
                   name="company_id"
                   id="company_id"
                   value="{{ $employee->company_id }}"
                   class="pl-2 bg-gray-500 text-white"
                   required
            >

            <label for="first_name"
                   class="pb-2"
            >
                 First Name:
            </label>

            <input type="first_name"
                   name="first_name"
                   id="first_name"
                   value="{{ $employee->first_name }}"
                   class="pl-2 bg-gray-500 text-white"
                   required
            >

            <label for="last_name"
                   class="pb-2"
            >
                Last Name:
            </label>

            <input type="last_name"
                   name="last_name"
                   id="last_name"
                   value="{{ $employee->last_name }}"
                   class="pl-2 bg-gray-500 text-white"
                   required
            >

            <label for="email"
                   class="pb-2"
            >
                Email:
            </label>

            <input type="email"
                   name="email"
                   id="email"
                   value="{{ $employee->email }}"
                   class="pl-2 bg-gray-500 text-white"
                   required
            >

            <label for="email"
                   class="pb-2"
            >
                Phone Number:
            </label>

            <input type="phone_number"
                   name="phone_number"
                   id="phone_number"
                   value="{{ $employee->phone_number }}"
                   class="pl-2 bg-gray-500 text-white"
                   required
            >


            <div class="flex justify-center">
                <button class="px-6 py-2 mt-6 text-white bg-yellow-600 rounded-lg hover:bg-red-700">
                    Submit Edit
                </button>
            </div>
        </form>
    </div>
</x-layout>
