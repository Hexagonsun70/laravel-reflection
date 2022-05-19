<section class="login flex items-center flex-col">

  <div class="bg-gray-800 mx-auto flex flex-col align-center my-9 px-9
            h-auto  w-9/12 rounded-xl shadow-2xl h-auto text-yellow-500">
      <h1 class="text-4xl py-9 flex justify-center font-bold">
          Laravel Reflection
      </h1>
      <p class="text-green-500 text-lg font-medium">
          This project is a mock SaaS app that enables you to create,
          read, update and delete data from joined tables in a DB.
          It has custom built authentication, factories and seeders
          for the joined tables to create data sets. The Kyslik package
          was used to sort the table columns and Laravel's scope filter
          method was used to add search functionality. The front-end has
          been written in the Alpine.JS and Tailwind frameworks.
      </p>
      <p class="flex justify-center my-6 font-bold text-2xl w-full text-g-500">
        Username: admin@admin.com<br>
        Password: uxiQxfG8YK5W2sG
      </p>

  </div>
  <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9
            h-auto  w-96 rounded-xl shadow-2xl h-auto">

    <h1 class="text-green-500 text-4xl text-center pt-6">Admin Login</h1>

      @if ($errors->any())
          <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

    <div class="py-6 font-bold text-green-500">

        <form method="POST" action="/login" class="flex flex-col">
            @csrf
            <label for="email"
                   class="pb-2"
            >
                Email:

            </label>

            <input type="email"
                   name="email"
                   id="email"
                   value=" {{ old('email') }}"
                   class="pl-2 bg-gray-500 text-white"
                   required
            >

            <label for="password"
                   class="py-2"
            >
                Password:

            </label>

            <input type="password"
                   name="password"
                   id="password"
                   class="pl-2 bg-gray-500 text-white"
                   required
            >

            <div class="flex justify-center">
                <button class="px-6 py-2 mt-6 text-white bg-green-500 rounded-lg hover:bg-green-600">
                    Log In
                </button>
            </div>
        </form>
    </div>
  </div>
</section>
