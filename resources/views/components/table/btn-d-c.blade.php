@csrf
@method('DELETE')
<button type="submit"
        class="bg-red-700 rounded text-white flex justify-center items-center p-2 w-9 my-1 h-9"
        onclick="return confirm('Are you sure? This will also delete all employees associated with this company!')"
>
    <i class="fas fa-trash-alt text-white"></i>
</button>
