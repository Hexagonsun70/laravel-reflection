<x-layout>
    <div>
        <div class="flex items-center">
                <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i>
                    <a href="/">Dashboard</a> /
                    <a href="{{ route('companies.index') }}">Companies</a>
                </span>
        </div>
        <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl">
            <h1 class="text-green-500 text-4xl text-center pt-6">
                Edit Company <br> <span class="text-yellow-400">{{ $company->name }}</span>
            </h1>

            @error('email')
            <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
                {{ $message }}
            </div>
            @enderror
            @error('logos')
            <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
                {{ $message }}
            </div>
            @enderror
            @error('website')
            <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
                {{ $message }}
            </div>
            @enderror

            <div class="py-6 font-bold text-yellow-400">
                <form method="POST"
                      action="{{ route('companies.update', $company) }}"
                      class="flex flex-col"
                >
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
                           class="p-2"
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

                    <div class=" w-full pt-2"
                         x-data="{ open: false,
                                   imgSrc: '{{ $company->logo }}',
                                   companyImg: '{{ $company->logo }}',
                         }"
                    >
                        <label for="company_id"
                               class="p-2 text-yellow-400"
                        >
                            Assign New Logo:
                        </label>
                        <select name="logo"
                                id="logo"
                                class="bg-gray-700 p-2 w-full"
                                x-model="imgSrc"
                                required
                        >
                            <option value="{{ $company->logo }}"
                                    class="text-green-400"
                            >
                                {{ $company->logo }}
                            </option>
                            @foreach ($logos as $logo)
                                @if($company->logo == $logo->file_path)
                                    @continue
                                @endif
                                <option class="p-2 text-yellow-400"
                                        value="{{ $logo->file_path }}"
                                >
                                    {{ $logo->file_path }}
                                </option>
                            @endforeach
                        </select>
                        <div class="flex justify-center w-full p-4">
                            <x-modal.preview />
                        </div>
                    </div>

                    <label for="website"
                           class="pb-2 px-2"
                    >
                        Website URL:
                    </label>
                    <input type="text"
                           name="website"
                           id="website"
                           value="{{ $company->website }}"
                           class="p-2 bg-gray-700 text-white w-full"
                           required
                    >

                    <button type="submit" class="px-6 py-2 mt-6 text-white bg-yellow-600 rounded-lg hover:bg-red-700">
                        Submit Edit
                    </button>
                </form>

            </div>
        </div>
        <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl m-8 p-6">
            <form class="text-yellow-400"
                  method="post"
                  action="{{route('companies.edit', $company)}}"
            >
                @csrf
                @method('POST')

                <label for="file" class="text-green-400 text-2xl">
                    Upload Logo:
                </label>
                <input type="file"
                       name="file"
                       accept="image/jpeg, image/png"
                       class="p-4"
                >
                <button type="submit"
                        class="bg-indigo-600 text-white w-full text-center p-2 corner rounded-xl"
                >
                    Upload image
                </button>

            </form>
        </div>
    </div>
</x-layout>
