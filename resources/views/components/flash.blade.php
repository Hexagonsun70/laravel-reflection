@if (session()->has('success'))

    <div x-data="{ show: true }"
         x-init="setTimeout( () => show = false, 4000)"
         x-show="show"
         class="fixed bottom-3 right-4 bg-green-500 text-white py-2 px-4 rounded-xl"
    >
        <p >
            {{ session('success') }}
        </p>
    </div>

@endif
