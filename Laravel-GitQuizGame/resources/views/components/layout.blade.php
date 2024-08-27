<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        
        <script src="//unpkg.com/alpinejs" defer></script>

        <script src="{{ asset('assets/js/quizScript.js') }}"></script>
        {{-- <link rel="stylesheet" href="{{ asset('assets/css/index-style.css') }}" --}}
        
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            // laravel: "#803D3B",
                            laravel: "#952323",
                            // background: '#E4C59E',
                            background: '#FFFFFFFF',
                            // Secondbackground: '#EEEBDD',
                            fontCol: '#322C2B',
                            white_color: '#FFF5EE'

                        },
                    },
                },
            };
        </script>
        <title>Git Quiz Game- Laravel</title>
    </head>
    <body class="mb-48 bg-background ">
        <nav class="flex justify-between items-center bg-white_color drop-shadow-xl">
            <a href="/"
                ><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg ">
                @auth
                    
                
                <li>
                    <span class="font-bold uppercase ">
                        Welcome {{auth()->user()->name}} 
                    </span>
                </li>
                

                {{-- display score --}}
                <div class="score-container">
                    <span id="score">Score: 0</span>
                </div> 
               

                <li>
                    <form action="{{route('logout')}}" class="inline" method="POST">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
                </li>

                @else

                <li>
                    <a href="/register" class="text-fontCol hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="text-fontCol hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>

<script>
window.addEventListener("scroll", function() {
    var navbar = document.getElementById("navbar");
    if (window.scrollY > 50) {
        navbar.classList.add("bg-laravel", "shadow-lg");
    } else {
        navbar.classList.remove("bg-laravel", "shadow-lg");
    }
});
</script>

        <main>
            {{$slot}}
        </main>
    
        <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold text-white h-16 mt-24 opacity-90 md:justify-center"
    style="background: linear-gradient(to right,#000000, #ef3b2d );"
>
    <p class="ml-1">Copyright &copy; 2024, All Rights reserved</p>

    <a
        href="/listings/create"
        class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
        >Post Job</a
    >
    <div class="absolute bottom-3 left-10 flex space-x-4 text-2xl">
        <a href="https://github.com/Dave-Priyanshu"><i class="fa-brands fa-github"></i></a>
        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        <a href="mailto:priyanshutest2001@gmail.com"><i class="fa-regular fa-envelope"></i></i></a>
    </div>
    
    
</footer>



</body>
</html>
