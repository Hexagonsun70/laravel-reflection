<button type="button"
        x-ref="modal1_button"
        @click="open = true"
        class="bg-red-700 hover:bg-red-800 rounded text-white flex justify-center items-center p-2 w-9 my-1 h-9"
>
    <i class="fas fa-trash-alt text-white"></i>
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
         class="flex flex-col rounded-lg shadow-lg overflow-hidden bg-gray-800 w-4.5/5 h-4.5/5 z-10 my-6">
        <div class="p-6 border-b border-dashed">
            <h2>
                <b class="text-yellow-400 text-xl">Are you Sure?</b>
            </h2>
            <p class="text-lg pt-1">
                Confirm whether you wish to delete
                <b class="text-yellow-400">{{ $company->name }}</b><br>
                All the companies associated employees will be deleted too.
            </p>
        </div>
        <div class="flex justify-around my-2">
            <form method="post"
                  action="{{ route('companies.destroy', $company) }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-green-600 hover:bg-green-500 rounded
                        text-white flex justify-center items-center p-2
                        my-1 px-4"
                >
                    <i class="fas fa-check"></i><b class="ml-2">CONFIRM</b>
                </button>
            </form>
            <button @click="open = false; $refs.modal1_button.focus()"
                    class="bg-red-700 hover:bg-red-600 rounded
                    text-white flex justify-center items-center p-2
                    my-1 px-4"
            >
                <i class="fas fa-times"></i><b class="ml-2">CANCEL</b>
            </button>
        </div>
    </div>
</div>

