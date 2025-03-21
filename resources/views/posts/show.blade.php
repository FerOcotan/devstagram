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
    <div class="w-full mt-4 p-3 bg-white rounded-lg shadow">
        
        <div class="mt-4">
            <p class="font-semibold text-gray-600">0 Likes</p>
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
  
                class="border p-3 w-full rounded-lg bg-white outline-none border-gray-200 focus:border-gray-200 @error('name') border-red-500 @enderror"
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
