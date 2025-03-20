<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devstagram - @yield('title')</title>
    @vite('resources/css/app.css')
</head>



<body class="bg-gray-100">
  <header class="p-5 border-b border-gray-200 bg-white shadow">
  
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-black">Devstagram</h1>


        @auth 
        <nav class="flex gap-2 items-center">
          <a class="font-bold uppercase text-gray-600 text-sm"  href="{{ route('login') }}">HI: <span class="font-normal">{{ auth()->user()->username }}</span></a>
          <form method="POST"  action="{{ route('logout') }}">
            @csrf
            <button type="submit"
          class="font-bold uppercase text-gray-600 text-sm" href="{{ route('logout') }}">Logout</button>
          
          </form>
      </nav>

        @endauth


        @guest
        <nav class="flex gap-2 items-center">
          <a class="font-bold uppercase text-gray-600 text-sm"  href="{{ route('login') }}">Login</a>
          <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Register</a>
          
          
      </nav>
        @endguest


    </div>
        
  </header>

  <main class="container mx-auto p-10">

    <h2 class="font-black text-center text-3xl mb-1">
        @yield('title')
    </h2>
        @yield('content')

  </main>

  <footer class="mt-10 text-center text-gray-500">
    Devstagram - @Copyright - Todos los derechos reservados
        {{ date('Y') }}
  </footer>

</body>
</html>