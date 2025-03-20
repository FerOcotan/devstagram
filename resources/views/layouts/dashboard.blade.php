@extends('layouts.app')

@section('title')
Perfil: {{ $user->username }}
@endsection


@section('content')

        <div class="flex justify-center">
            <div class="w-full md:8/12 lg:w-6/12 flex flex-col items-center md:items-start md:flex-row  py-10 md:py-10">
                <div class="w-8/12 lg:w-6/12 px-5">
              <img src="{{ asset('img/usuario.svg') }}" alt="img user">
                </div>


                <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md-justify-center md:items-start py-10 md:py-10">
                    
                <p class="text-gray-700 text-2xl ">
                    {{ $user->username }}
                 
                </p>

                <p class="text-gray-800 text-sm mb-3 font-semibold mt-5">
                    0
                  <span class="font-normal ">Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-semibold">
                    0
                    <span class="font-normal ">Siguiendo</span>
                    <p class="text-gray-800 text-sm mb-3 font-semibold">
                        0
                        <span class="font-normal ">Posts</span>
                </div>

            </div>
        </div>


<section class="container mx-auto mt-10">

    <h2 class="text-center text-2xl font-black text-gray-800 mt-10">Publicaciones
    </h2>

@if ($posts->count() > 0)
        

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">

    @foreach ($posts as $post)
    <div>
        
        <a href="">
            
            <img src="{{  asset('uploads') .'/'. $post->imagen }}" alt="imagen del post" {{ $post->titulo }}>
        </a>
    </div>
    @endforeach
</div>

<div class="mt-10">
    {{ $posts->links() }}
</div>

@else


<p class="text-gray-600 uppercase text-sm text-center font-bold">No existen post</p>

@endif
   
</section>


@endsection