@extends('layouts.app')

@section('title')
Tu cuenta
@endsection


@section('content')

        <div class="flex justify-center">
            <div class="w-full md:8/12 lg:w-6/12 md:flex">
                <div class="md:w-8/12 lg:w-6/12 px-5">
              <img src="{{ asset('img/usuario.svg') }}" alt="img user">
                </div>
                <div class="md:w-8/12 lg:w-6/12 px-5">
                <p class="text-gray-700 text-2xl ">
                    {{ Auth::user()->name }}
                 
                </p>
                </div>

            </div>
        </div>

@endsection