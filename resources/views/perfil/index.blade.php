@extends('layouts.app')


@section('title')

       Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('content')

<div class="md:flex md:justify-center">

    <div class="md:w-1/2 bg-white shadow p-6">

        <form action=" {{ route('perfil.store') }}" enctype="multipart/form-data"   method="POST"       class="mt-10 md:mt-0">
            
            @csrf
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase
                 text-gray-500 font-bold">Username</label>
                <input type="text"  placeholder="Name of user"  id="username" name="username"
                value="{{ auth()->user()->username }}"
                class="border p-3 w-full rounded-lg bg-white outline-none focus:border-gray-500 @error('username') border-red-500 @enderror"/>
        
                @error('username')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center">{{ $message }}</p>
                @enderror
        
            </div>
            
            
            <div class="mb-5">
                <label for="imagen" class="mb-2 block uppercase
                text-gray-500 font-bold">Imagen perfil</label>
                <input type="file"   id="imagen" name="imagen"
                value=""
                accept=".jpg, .jpeg, .png"
                class="border p-3 w-full rounded-lg"/>
                
                
            </div>
            
            <input type="submit" value="Guardar cambios" class="bg-blue-500 w-full p-3 text-white uppercase font-bold rounded-lg cursor-pointer"/>
            
        </form>
    </div>
  
</div>

@endsection