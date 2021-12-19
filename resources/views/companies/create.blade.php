<x-layout>
        <div>
            <div class="flex items-center">
                <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i>
                    <a href="/">Dashboard</a> /
                    <a href="{{ route('companies.index') }}">Companies</a>
                </span>
            </div>
            <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl text-green-500">
                <h1 class="text-4xl text-center pt-6">Add Company</h1>

                @error('email')
                    <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
                        {{ $message }}
                    </div>
                @enderror
                @error('website')
                <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
                    {{ $message }}
                </div>
                @enderror

                <div class="py-6 font-bold">

                        <form method="post" action="{{ route('companies.index') }}" class="flex flex-col">
                            @csrf
                            @method('POST')
                            <label for="name"
                                   class="p-2 text-yellow-400"
                            >
                                Company Name:
                            </label>
                            <input type="text"
                                   name="name"
                                   value="{{ old('name') }}"
                                   class="bg-gray-700 p-2 w-full"
                                   required
                            >


                            <label for="email"
                                   class="p-2 text-yellow-400"
                            >
                                Email:
                            </label>
                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   class="bg-gray-700 p-2 w-full"
                                   required
                            >


                            <div class=" w-full pt-2"
                                 x-data="{ open: false,
                                   imgSrc: '',
                                 }"
                            >
                                <label for="logo"
                                       class="p-2 text-yellow-400"
                                >
                                    Assign Logo:
                                </label>
                                <select type="text"
                                        name="logos"
                                        class="bg-gray-700 p-2 w-full text-yellow-400"
                                        x-model="imgSrc"
                                        required
                                >
                                    @foreach ($logos as $logo)
                                        <option class="p-2 text-yellow-400"
                                                value="{{ $logo->file_path }}"
                                        >
                                            {{ $logo->file_path }}
                                        </option>
                                    @endforeach

                                </select>
                                <div class="flex justify-center w-full p-4">
                                    <x-modal.preview-c />
                                </div>
                            </div>


                            <label for="website"
                                   class="p-2 text-yellow-400"
                            >
                                Website URL:
                            </label>
                            <input type="text"
                                   name="website"
                                   value="{{ old('website') }}"
                                   class="bg-gray-700 p-2 w-full"
                                   required
                            >

                            <div class="flex justify-center">
                                <button type="submit"
                                        class="px-6 py-2 mt-6 text-white bg-green-600 rounded-lg hover:bg-green-600">
                                    Add Company
                                </button>
                            </div>
                    </form>
                </div>
            </div>
            <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl m-8 p-6">
                <a class="bg-indigo-600 text-white w-full text-center p-2 corner rounded-xl font-bold tracking-wider" href="/logos">
                    Upload Company Logo
                </a>
            </div>
        </div>
</x-layout>
