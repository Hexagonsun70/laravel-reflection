<x-layout>
    <div class="flex flex-col justify-center content-center">
        <div class="w-96 flex flex-col content-center m-6">

            <section class="mb-6">
                @if ($errors->has('file'))
                    <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <div class="flex items-center">
                        <span class="text-gray-800 text-xl p-2">
                            <i class="fas fa-angle-double-right"></i>
                            <a href="{{ route('logos.index') }}">Logos</a>
                        </span>
                    </div>
                    <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl p-6">
                        <form class="text-yellow-400"
                              method="post"
                              action="{{ route('logos.store') }}"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            @method('POST')

                            @error('file_path')
                            <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="file_path" class="text-green-400 text-2xl">
                                Upload a Logo:
                            </label>
                            <input type="file"
                                   name="file_path"
                                   accept="image/*"
                                   class="p-4"
                            >
                            <button type="submit"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white w-full text-center p-2 corner
                               rounded-xl"
                            >
                                Upload image
                            </button>
                        </form>
                    </div>
                </div>
            </section>

            <section>
                <div class="flex items-center">
                    <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i>
                        <a href="/">Dashboard</a> /
                        <a href="{{ route('companies.index') }}">Companies</a>
                    </span>
                </div>
                <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl text-green-500">
                    <h1 class="text-4xl text-center pt-6">Add Company</h1>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            @if(preg_match('/(file)/', $error))
                                @continue
                            @endif
                        <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
                            <ul>
                                    <li>{{ $error }}</li>
                            </ul>
                        </div>
                        @endforeach
                    @endif

                    <div class="py-6 font-bold">

                            <form method="post" action="{{ route('companies.index') }}" class="flex flex-col" novalidate>
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
                                            class="bg-gray-700 p-2 w-full text-yellow-400 mt-2"
                                            x-model="imgSrc"
                                            required
                                    >
                                        <option disabled
                                                selected
                                                value
                                        >
                                            Please Upload and Select a Logo
                                        </option>
                                        @foreach ($logos as $logo)
                                            <option class="p-2 text-yellow-400"
                                                    value="{{ $logo->file_path }}"
                                                    selected=""
                                            >
                                                {{ substr($logo->file_path, 13, -4) }}
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
            </section>
        </div>
    </div>
</x-layout>
