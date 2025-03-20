@extends('layouts.app')

@section('title')
    login in devstagram
@endsection

@section("content")
<div class="md:flex md:justify-center md:gap-10 md:items-center">

    <div class="md:w-6/12 p-5">
        <img src="{{ asset('img/login.jpg') }}" alt="login_imagen user" >
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xs">
<form action="{{ route('login')  }}" method="POST" novalidate>
@csrf

   @if(session('mensaje'))
   <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center">{{ session('mensaje') }}</p>
   @endif
   
 
   

    
    <div class="mb-5">
        <label for="email" class="mb-2 block uppercase
         text-gray-500 font-bold">Email</label>
        <input type="email"  placeholder="Email"  id="email" name="email"
        value="{{ old('email') }}"
        class="border p-3 w-full rounded-lg bg-white outline-none focus:border-gray-500 @error('email') border-red-500 @enderror"/>

        @error('email')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-5">
        <label for="password" class="mb-2 block uppercase
         text-gray-500 font-bold">Password</label>
         
        <input type="password"  placeholder="password of register"  id="password" name="password"
        class="border p-3 w-full rounded-lg bg-white border-gray-200 outline-none focus:border-gray-500"/>


        @error('password')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center">{{ $message }}</p>
        @enderror
    </div>


    <div class="mb-5">
        <label for="remember" class="mb-2 block uppercase
         text-gray-500">Remember me</label>
        <input type="checkbox"  id="remember" name="remember" class="mr-1"/>
    </div>
 
    
    <input type="submit" value="Login" class="bg-blue-500 w-full p-3 text-white uppercase font-bold rounded-lg cursor-pointer"/>


</form>
    </div>

</div>
@endsection
