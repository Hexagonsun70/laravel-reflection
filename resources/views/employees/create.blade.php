<x-layout>
    <section>
        <div class="mt-6">
            <a href="{{ route('employees.index') }}">
                <div class="flex items-center">
                    <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i> Back to Employees</span>
                </div>
            </a>
            <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl">
                <h1 class="text-green-500 text-4xl text-center pt-6">Add Employee</h1>


                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
                            <ul>
                                <li>{{ $error }}</li>
                            </ul>
                        </div>
                    @endforeach
                @endif
{{--                @error('email')--}}
{{--                <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">--}}
{{--                    {{ $message }}--}}
{{--                </div>--}}
{{--                @enderror--}}

                <div class="py-6 font-bold text-green-500">

                    <form method="POST" action="{{ route('employees.store') }}" class="flex flex-col" novalidate>
                        @csrf
                        <label for="company_id"
                               class="p-2 text-yellow-400"
                        >
                            Company:
                        </label>
                        <x-dropdown.employee-create :companies="$companies" />

                        <label for="first_name"
                               class="p-2 text-yellow-400"
                        >
                            First Name:
                        </label>
                        <input type="first_name"
                               name="first_name"
                               id="first_name"
                               value="{{ old('first_name') }}"
                               class="p-2 bg-gray-700 text-yellow-400"
                               required
                        >


                        <label for="last_name"
                               class="p-2 text-yellow-400"
                        >
                            Last Name:
                        </label>
                        <input type="last_name"
                               name="last_name"
                               id="last_name"
                               value=" {{ old('last_name') }}"
                               class="p-2 bg-gray-700 text-yellow-400"
                               required
                        >


                        <label for="email"
                               class="p-2 text-yellow-400"
                        >
                            Email:
                        </label>
                        <input type="email"
                               name="email"
                               id="email"
                               value=" {{ old('email') }}"
                               class="p-2 bg-gray-700 text-yellow-400"
                               required
                        >


                        <label for="phone_number"
                               class="p-2 text-yellow-400"
                        >
                            Phone Number:
                        </label>
                        <input type="tel"
                               name="phone_number"
                               id="phone_number"
                               value=" {{ old('phone_number') }}"
                               class="p-2 bg-gray-700 text-yellow-400"
                               required
                        >


                        <div class="flex justify-center">
                            <button class="px-6 py-2 mt-6 text-white bg-green-600 rounded-lg hover:bg-green-700">
                                Add Employee
                            </button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </section>
</x-layout>
