<x-layout>
    <section class="m-8">

        <div class="flex items-center">
            <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i>
                <a href="/">Dashboard</a> /
                <a href="{{ route('employees.index') }}">Employees</a>
            </span>
        </div>

        <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl">
        <h1 class="text-green-500 text-4xl text-center pt-6">
            Edit Employee <br> <span class="text-yellow-400">{{$employee->first_name}} {{ $employee->last_name }}</span>
        </h1>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
                        <ul>
                            <li>{{ $error }}</li>
                        </ul>
                    </div>
                @endforeach
            @endif

        <div class="py-6 font-bold text-yellow-400">

            <form method="POST"
                  action="{{ route('employees.update', $employee) }}"
                  class="flex flex-col"
                  novalidate
            >
                @csrf
                @method('PATCH')
                <label for="company_id"
                       class="m-2 text-yellow-400"
                >
                    Company:
                </label>

                <x-dropdown.employee-edit :companies="$companies" :employee="$employee" />

                <label for="first_name"
                       class="m-2"
                >
                     First Name:
                </label>

                <input type="text"
                       name="first_name"
                       id="first_name"
                       value="{{ old('first_name') ?? $employee->first_name }}"
                       class="p-2 bg-gray-700 text-white"
                       required
                >

                <label for="last_name"
                       class="m-2"
                >
                    Last Name:
                </label>

                <input type="text"
                       name="last_name"
                       id="last_name"
                       value=" {{old('last_name') ?? $employee->last_name }}"
                       class="p-2 bg-gray-700 text-white"
                       required
                >

                <label for="email"
                       class="m-2"
                >
                    Email:
                </label>

                <input type="email"
                       name="email"
                       id="email"
                       value="{{ old('email') ?? $employee->email }}"
                       class="p-2 bg-gray-700 text-white"
                >

                <label for="phone_number"
                       class="m-2"
                >
                    Phone Number:
                </label>

                <input type="tel"
                       name="phone_number"
                       id="phone_number"
                       value="{{ old('phone_number') ?? $employee->phone_number }}"
                       class="p-2 bg-gray-700 text-white"
                       required
                >
                <div class="flex justify-center">
                    <button type="submit" class="px-6 py-2 mt-6 text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 w-44">
                        Submit Edit
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-layout>
