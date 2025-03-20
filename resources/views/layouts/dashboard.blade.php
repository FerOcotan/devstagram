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

@endsection