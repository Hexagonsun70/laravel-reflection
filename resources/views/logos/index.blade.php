<x-layout>
    <section clASS="flex flex-wrap justify-center">
        <div class="m-8">
            <div class="flex items-center">
                <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i>
                    <a href="{{ url()->previous() }}">Back</a>
                </span>
            </div>
            <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl  p-6">

            @foreach($logos as $logo)
                <div class="w-64 bg-gray-800 text-yellow-400 h-auto rounded-xl m-4">
                    <div class="border-t border-b border-white border-dashed">
                        <h1 class="p-2">
                            <span class="text-green-400 font-bold">Logo File Name:</span> {{ substr($logo->file_path, 13) }}
                        </h1>
                    </div>
                    <div class="flex justify-center pt-4">
                        <img src="{{ $logo->file_path }}"
                             class="w-32 h-32 object-cover "
                        >
                    </div>
                    <div x-data="{open: false}" class="flex justify-center mt-2">
                            <x-modal.l-del :logo="$logo" />
                        </form>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
</x-layout>
