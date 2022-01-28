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

<div style="display:none"
     role="dialog"
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
        <div x-if="imgSrc = ''"></div>
        <div class="p-6 border-b border-dashed">
            <h2>
                <b class="text-green-500 text-xl mb-1">Logo Name:</b>
                <span class="text-yellow-400" id="modal1_label" x-text="imgSrc.substring(13)"></span>
            </h2>
        </div>
        <div class="p-6 mb-1">
            <span>Logo:</span>
            <div class="h-full w-full flex justify-center items-center">
                <img class="w-48 h-48 object-cover rounded" :src="imgSrc">
            </div>
        </div>
    </div>
</div>

