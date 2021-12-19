<x-layout>
  <section class="login flex items-center">
     <div class="flex flex-col justify-center align-baseline-start bg-gray-800  w-96 h-36 rounded-xl p-6">
         <h1 class=" m-auto text-4xl text-green-400 pb-6">
             Dashboard
         </h1>
         <div class="flex justify-around">
             <a href="/companies">
                 <div class="bg-green-500 hover:bg-green-700  text-white rounded w-auto flex items-center justify-center py-2 px-4 font-bold tracking-wide">
                     Company Table
                 </div>
             </a>
             <a href="/employees">
                 <div class="bg-green-500 hover:bg-green-700  text-white rounded w-auto flex items-center justify-center py-2 px-4 font-bold tracking-wide tracking-wider">
                     Employee Table
                 </div>
             </a>
         </div>
     </div>
  </section>
</x-layout>
