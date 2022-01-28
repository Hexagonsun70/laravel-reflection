<div x-data="{ open: false }">
    <button x-ref="modal1_button"
            @click="open = true"
            class="w-full bg-indigo-600 px-4 py-2 border border-transparent rounded-md flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-auto sm:inline-flex">
        Open Modal
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
             class="flex flex-col rounded-lg shadow-lg overflow-hidden bg-white w-3/5 h-3/5 z-10">
            <div class="p-6 border-b">
                <h2 id="modal1_label">Header</h2>
            </div>
            <div class="p-6">
                Content
            </div>
        </div>
    </div>
</div>
