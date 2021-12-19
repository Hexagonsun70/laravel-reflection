<x-layout>
    <section class="flex flex-wrap justify-center">
        <div class="m-8">
            <div class="flex items-center">
                <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i>
                    <a href="/">Dashboard</a> /
                    <a href="{{ route('companies.index') }}">Companies</a> /
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
                        Upload Logo:
                    </label>
                    <input type="file"
                           name="file_path"
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
    </section>
</x-layout>
