@extends('layouts.app')

@section('title')
Perfil: {{ $user->username }}
@endsection


@section('content')

        <div class="flex justify-center">
            <div class="w-full md:8/12 lg:w-6/12 flex flex-col items-center md:items-start md:flex-row  py-10 md:py-10">
                <div class="w-8/12 lg:w-6/12 px-5">
            <img src="{{ 
                $user -> imagen? 
                asset('perfiles'. '/'. $user->imagen) :  
                asset('img/usuario.svg') }}" 
                alt="img user">
    
                </div>


                <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md-justify-center md:items-start py-10 md:py-10">
                    
              
              
                <div class="flex items-center gap-2">

                    
                    <p class="text-gray-700 text-2xl ">{{ $user->username }} </p>
                    @auth
                    
                    @if ($user->id == auth()->user()->id)
                    
                    <a href="{{ route('perfil.index')  }}" class="text-gray-700 hover:text-gray-900 cursor-pointer">   
                        

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                        
                    </a>
                    @endif
                    @endauth
                    
                </div>

                <p class="text-gray-800 text-sm mb-3 font-semibold mt-5">
                    {{ $user->followers->count() }}
                  <span class="font-normal ">@choice('Seguidor|Seguidores', $user->followers->count())</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-semibold">
                    {{ $user->followings->count() }}
                  <span class="font-normal "> Siguiendo</span>
                </p>

                    
                    <p class="text-gray-800 text-sm mb-3 font-semibold">
                        {{ $user->posts->count() }}
                        <span class="font-normal ">Posts</span>

                    </p>

                    
                    @auth
                    @if ($user->id != auth()->user()->id)
                    @if (!$user->siguiendo(auth()->user()))
                        
     
                    
                    <form 
                    action="{{ route('users.follow', $user) }}" 
                    method="POST" >
                        @csrf
                        <input type="submit"
                        value="Seguir"
                        class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer">
                        
                    </form>
                    
                    @else
                    <form 
                    action="{{ route('users.unfollow', $user) }}" 
                    method="POST" >
                        @csrf
                        @method('DELETE')
                        <input type="submit"
                        value="Dejar de seguir"
                        class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer">
                        
                    </form>
                    @endauth
                    @endif
                    @endif
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
        
        <a href="{{ route('posts.show', ['post'=> $post, 'user' => $user]) }}">
            
            <img src="{{  asset('uploads') .'/'. $post->imagen }}" alt="imagen del post" 
            
            {{ $post->titulo }}>
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