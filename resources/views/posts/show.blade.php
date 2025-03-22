@extends('layouts.app')

@section('title')

{{ $post->titulo }}

@endsection


@section('content')
<div class="container mx-auto max-w-2xl p-4">

    <!-- Imagen del Post -->
    <div class="w-full">
        <img src="{{ asset('uploads') . '/' . $post->imagen }}" 
             alt="Imagen del post {{ $post->titulo }}" 
             class="w-full rounded-lg shadow-md">
    </div>

    <!-- Contenido del Post -->
    <div class="w-full mt-4 p-3 bg-white rounded-lg shadow items-center gap-0">
        
        <div class="p-3 flex items-center gap-4">
            @auth

            @if (!$post->checkLike(auth()->user()))
            <form method="POST" action="{{ route('posts.likes.store',$post) }}">
                @csrf
                        <div class="flex items-center gap-2">
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="white" viewBox="0 0 24 24" stroke="#ef4444" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div> 
    
    
                    </div>
            </form>
            @else
            <form method="POST" action="{{ route('posts.likes.destroy',$post) }}">
                @method('DELETE')
                @csrf
                        <div class="flex items-center gap-2">
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="red" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div> 
    
    
                    </div>
            </form>
            @endif
                
        
         @endauth
            <p class="font-bold"> {{ $post->likes->count() }} 
                
               <span class="font-normal">Likes</span> 
            </p>
            
        </div>
        

        <p class="font-bold text-lg">
            {{ $post->user->username }}
        </p>

        <p class="text-gray-500 text-sm">
            {{ $post->created_at->diffForHumans() }}
        </p>
        <p class="mt-3 text-gray-700">
            {{ $post->descripcion }}
        </p>

   

    </div>

    @auth
    @if ($post -> user_id === auth()->user()->id)
        
 

    <form action="{{route('post.destroy', $post)}}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        
        <input type="submit" value="Eliminar Publicación" 
        class="bg-red-500 hover:bg-red-600 text-white font-bold rounded px-4 py-2 
               mt-4 cursor-pointer transition-all duration-200 
               focus:outline-none focus:ring-2 focus:ring-red-400"/>
 
        
    </form>
    @endif
           
    @endauth

    <div class="md:w-1/2 p-5 "></div>
    <div class="shadow bg-white p-5 mb-5">
        @auth
        @if (session('mensaje'))
        <div class="bg-green-500 text-white p-3 text-center mb-3 uppercase font-bold">
            {{ session('mensaje') }}
        </div>
        @endif
            
      
        <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
       
        <form action="{{ route('comentarios.store', ['post'=> $post, 'user' => $user]) }}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase
                 text-gray-500 font-bold">Add coment</label>
        
                 
                <textarea 
                type="text"  
                placeholder="coments of the post" 
                 id="comentario"

                  name="comentario"
  
                class="border p-3 w-full rounded-lg bg-white outline-none border-gray-200 focus:border-gray-200 @error('name') @enderror"
                ></textarea>
                
                @error('comentario')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center">{{ $message }}</p>
                @enderror


                <input type="submit" value="Comentar" class="bg-blue-500 w-full p-3 text-white uppercase font-bold rounded-lg cursor-pointer"/>
            </div>

        </form>
        @endauth

        <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
            @if ($post->comentarios->count())
            @foreach ($post->comentarios as $comentario)
            <div class="p-5 border-b border-gray-200">
               <a href="{{route('post.index',$comentario->user )}}" class="font-bold">{{ $comentario->user ->username}}</a>
                <p class="text-gray-500 text-sm">{{ $comentario->created_at->diffForHumans() }}</p>
                <p class="mt-3">{{ $comentario->comentario }}</p>
          
            </div>
            @endforeach     
            @else
                    <p class="text-center text-gray-500 p-5">No hay comentarios</p>
                
            @endif
            
        </div>

    </div>
    
</div>

</div>
@endsection
