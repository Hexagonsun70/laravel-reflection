<x-layout>
    <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl">
        <h1 class="text-green-500 text-4xl text-center pt-6">
            Edit Company <br> <span class="text-yellow-400">{{ $company->name }}</span>
        </h1>

        @error('email')
        <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
            {{ $message }}
        </div>
        @enderror

        <div class="py-6 font-bold text-yellow-400">
            <form method="POST" action="{{ route('companies.update', $company) }}" class="flex flex-col">
                @csrf
                @method('PATCH')
                <label for="name"
                       class="p-2 text-yellow-400"
                >
                    Company Name:
                </label>
                <input type="text"
                       name="name"
                       id="name"
                       value="{{ $company->name }}"
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
                       value="{{ $company->email }}"
                       class="p-2 bg-gray-700 text-white"
                       required
                >

                <label for="logo"
                       class="pb-2"
                >
                    Logo File Name:
                </label>
                <input type="text"
                       name="logo"
                       id="logo"
                       value="{{ $company->logo }}"
                       class="p-2 bg-gray-700 text-white"
                       required
                >

                <label for="website"
                       class="pb-2"
                >
                    Website URL:
                </label>
                <input type="text"
                       name="website"
                       id="website"
                       value="{{ $company->website }}"
                       class="p-2 bg-gray-700 text-white"
                       required
                >

                <button type="submit" class="px-6 py-2 mt-6 text-white bg-yellow-600 rounded-lg hover:bg-red-700">
                    Submit Edit
                </button>
            </form>
        </div>
</x-layout>
