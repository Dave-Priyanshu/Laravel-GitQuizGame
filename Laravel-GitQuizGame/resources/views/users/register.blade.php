<x-layout>
    <div class="bg-gray-200 p-10 max-w-lg mx-auto mt-24">
     <header class="text-center">
         <h2 class="text-2xl font-bold uppercase mb-1">
             Register 
         </h2>
         <p class="mb-4">Create new account</p>
     </header>
 
     <!-- Progress Bar -->
     <div class="relative mb-6">
         <div class="relative h-5 bg-white rounded-full overflow-hidden">
             <div id="progress-bar" class="h-full bg-laravel transition-all duration-500 ease-in-out rounded-full"></div>
             <div class="absolute inset-0 flex items-center justify-between px-2 text-xs font-semibold text-white">
                 <span class="text-black flex-shrink-0">0%</span>
                 <span class="text-black flex-shrink-0">100%</span>
             </div>
         </div>
     </div>
 
     <form id="registration-form" action="{{url('/register')}}" method="POST">
         @csrf

         <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">
                Name
            </label>
            <div class="relative">
                <input
                    type="text"
                    id="name"
                    class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:outline-none focus:ring-2 focus:ring-laravel transition duration-300"
                    name="name"
                    placeholder="Enter your name"
                    value="{{old('name')}}"
                />
                <i class="fa fa-user absolute top-4 left-3 text-gray-500"></i>
            </div>
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
         
         <div class="mb-6">
             <label for="email" class="inline-block text-lg mb-2">
                 Email
             </label>
             <div class="relative">
                 <input
                     type="email"
                     id="email"
                     class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:outline-none focus:ring-2 focus:ring-laravel transition duration-300"
                     name="email"
                     placeholder="Enter your email"
                     value="{{old('email')}}"
                 />
                 <i class="fa fa-envelope absolute top-4 left-3 text-gray-500"></i>
             </div>
             @error('email')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
         </div>
 
         <div class="mb-6">
             <label for="password" class="inline-block text-lg mb-2">
                 Password
             </label>
             <div class="relative">
                 <input
                     type="password"
                     id="password"
                     class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:outline-none focus:ring-2 focus:ring-laravel transition duration-300"
                     name="password"
                     placeholder="Enter your password"
                 />
                 <i class="fa fa-lock absolute top-4 left-3 text-gray-500"></i>
             </div>
             @error('password')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
         </div>
 
        
 
         <div class="mb-6">
             <button
                 type="submit"
                 class="bg-laravel text-white rounded py-2 px-4 hover:bg-black transition duration-300 flex items-center"
             >
                 <i class="fa fa-user-plus mr-2"></i> Sign Up
             </button>
         </div>
 
         <div class="mt-8 text-center">
             <p>
                 Already have an account?
                 <a href="/login" class="text-laravel hover:text-red-700 transition duration-300">Login</a>
             </p>
         </div>
     </form>
    </div>
 
    <script>
         function updateProgressBar() {
             const formFields = document.querySelectorAll('#registration-form input');
             const totalFields = formFields.length;
             const filledFields = Array.from(formFields).filter(field => field.value.trim() !== '').length;
             const progress = Math.min((filledFields / totalFields) * 100, 100);
             document.getElementById('progress-bar').style.width = progress + '%';
         }
 
         document.querySelectorAll('#registration-form input').forEach(field => {
             field.addEventListener('input', updateProgressBar);
         });
 
         updateProgressBar();
     </script>
 </x-layout>
 