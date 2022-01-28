<button type="button"
        x-ref="modal1_button"
        @click="open = true"
        class="w-full bg-indigo-600 px-4 py-2 border border-transparent
        rounded-md flex items-center justify-center text-base font-medium
        text-white hover:bg-indigo-700 focus:outline-none focus:ring-2
        focus:ring-offset-2 focus:ring-indigo-500 sm:w-auto sm:inline-flex"
>
    Image Preview
</button>

<div role="dialog"
     aria-labelledby="modal1_label"
     aria-modal="true"
     tabindex="0"
     x-show="open"
     @click="open = false; $refs.modal1_button.focus()"
     @click.away="open = false; $refs.modal1_button.focus()"
     class="fixed top-0 left-0 w-full h-screen flex justify-center items-center">
    <div class="absolute top-0 left-0 w-full h-screen bg-black opacity-60"
         aria-hidden="true"
         x-show="open"></div>
    <div @click.stop=""
         x-show="open"
         class="flex flex-col rounded-lg shadow-lg overflow-hidden bg-gray-800 w-4.5/5 h-4.5/5 z-10">
        <div class="p-6 border-b border-dashed">
            <h2>
                <b class="text-green-500 text-xl">New Logo:</b>
                <span id="modal1_label" x-text="imgSrc.substring(13)"></span>
            </h2>
        </div>
        <div class="p-6">
            <span class="text-green-500">
                Current Logo: <br>
                <p class="text-yellow-400" x-text="companyImg.substring(13)"></p>
            </span>
            <div class="h-full w-full flex justify-center items-center mt-2">
                <img class="w-32 h-32 object-cover rounded" :src="companyImg">
            </div>
        </div>
        <div class="p-6">
            <span class="text-green-500">
                New Logo: <br>
                <p class="text-yellow-400" x-text="imgSrc.substring(13)"></p>
            </span>
            <div class="h-full w-full flex justify-center items-center mt-2">
                <img class="w-32 h-32 object-cover rounded" :src="imgSrc">
            </div>
        </div>
    </div>
</div>

