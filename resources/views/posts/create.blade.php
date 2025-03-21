@extends('layouts.app')

@section('title')
    Crear Post


@endsection

@section('content')

    <div class="md:flex md:items-center">
        <div class="md:w-1/2">
     <form     action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded 
     flex flex-col   justify-center items-center">
    @csrf
    </form>

    </div>
    <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xs mt-10">
        <form action="{{ route('post.store')  }}" method="POST" novalidate>
            @csrf
            
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase
                     text-gray-500 font-bold">Titulo</label>
            
                     
                    <input 
                    type="text"  
                    placeholder="tittle of the post" 
                     id="titulo"
                      name="titulo"
                      value="{{ old('titulo') }}"
                    class="border p-3 w-full rounded-lg bg-white outline-none border-gray-200 focus:border-gray-200 @error('name') @enderror"/>
                    
                    @error('titulo')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                    
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase
                     text-gray-500 font-bold">Descripcion</label>
            
                     
                    <textarea 
                    type="text"  
                    placeholder="descripcion of the post" 
                     id="descripcion"
                     value="{{ old('descripcion') }}"
                      name="descripcion"
      
                    class="border p-3 w-full rounded-lg bg-white outline-none border-gray-200 focus:border-gray-200 @error('name') @enderror"
                    >{{ old('descripcion') }}</textarea>
                    
                    @error('descripcion')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                    
                </div>

                <div class="mb-5">
                    <input
                     name="imagen"
                     type="hidden"
                     value="{{ old('imagen') }}"
                     />

                     @error('imagen')
                     <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center">{{ $message }}</p>
                     @enderror
                </div>

                <input type="submit" value="Publicar" class="bg-blue-500 w-full p-3 text-white uppercase font-bold rounded-lg cursor-pointer"/>

             
                
             
               
            
            </form>
  
      </div>

</div>
@endsection