<x-layout>
    <div>

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

        @error('email')
        <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
            {{ $message }}
        </div>
        @enderror

        <div class="py-6 font-bold text-yellow-400">
            <form method="POST" action="{{ route('employees.update', $employee) }}" class="flex flex-col">
                @csrf
                @method('PATCH')
                <label for="company_id"
                       class="p-2 text-yellow-400"
                >
                    Company:
                </label>
                <select name="company_id"
                        id="company_id"
                        class="bg-gray-700 text-yellow-400 p-2"
                        required
                >
                    <option value="{{ $employee->company_id }}"
                    >
                        {{ substr($employee->company()->pluck('name') , 2, -2) }}
                    </option>
                    @foreach ($companies as $company)
                        @if($company->id == $employee->company_id)
                        @continue
                        @endif
                        <option class="p-2"
                                value="{{ $company->id }}"
                        >
                            {{ ucwords($company->name) }}
                        </option>
                    @endforeach
                </select>

                <label for="first_name"
                       class="pb-2"
                >
                     First Name:
                </label>

                <input type="text"
                       name="first_name"
                       id="first_name"
                       value="{{ $employee->first_name }}"
                       class="p-2 bg-gray-700 text-white"
                       required
                >

                <label for="last_name"
                       class="pb-2"
                >
                    Last Name:
                </label>

                <input type="text"
                       name="last_name"
                       id="last_name"
                       value="{{ $employee->last_name }}"
                       class="p-2 bg-gray-700 text-white"
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
                       class="p-2 bg-gray-700 text-white"
                       required
                >

                <label for="phone_number"
                       class="pb-2"
                >
                    Phone Number:
                </label>

                <input type="tel"
                       name="phone_number"
                       id="phone_number"
                       value="{{ $employee->phone_number }}"
                       class="p-2 bg-gray-700 text-white"
                       required
                >

                    <button type="submit" class="px-6 py-2 mt-6 text-white bg-yellow-600 rounded-lg hover:bg-red-700">
                        Submit Edit
                    </button>
            </form>
        </div>
    </div>
</x-layout>
