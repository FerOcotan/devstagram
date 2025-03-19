@extends('layouts.app')

@section('title')
    Register in devstagram
@endsection

@section("content")
<div class="md:flex md:justify-center md:gap-10 md:items-center">

    <div class="md:w-6/12 p-5">
        <img src="{{ asset('img/registrar.jpg') }}" alt="register_imagen" >
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xs">
<form action="{{ route('register')  }}" method="POST" novalidate>
@csrf

    <div class="mb-5">
        <label for="name" class="mb-2 block uppercase
         text-gray-500 font-bold">Name</label>

         
        <input 
        type="text"  
        placeholder="Complete name" 
         id="name"
          name="name"
          value="{{ old('name') }}"
        class="border p-3 w-full rounded-lg bg-white outline-none focus:border-gray-500 @error('name') border-red-500 @enderror"/>
    </div>

   @error('name')
   <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center">{{ $message }}</p>
   @enderror
   
 
    <div class="mb-5">
        <label for="username" class="mb-2 block uppercase
         text-gray-500 font-bold">Username</label>
        <input type="text"  placeholder="Name of user"  id="username" name="username"
        class="border p-3 w-full rounded-lg bg-white border-gray-200 outline-none focus:border-gray-500"/>

        @error('username')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center">{{ $message }}</p>
        @enderror

    </div>
    <div class="mb-5">
        <label for="email" class="mb-2 block uppercase
         text-gray-500 font-bold">Email</label>
        <input type="email"  placeholder="Email"  id="email" name="email"
        class="border p-3 w-full rounded-lg bg-white border-gray-200 outline-none focus:border-gray-500"/>
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
        <label for="password_confirmation" class="mb-2 block uppercase
         text-gray-500 font-bold">Repit password</label>
        <input type="password"  placeholder="password confirmation"  id="password_confirmation" name="password_confirmation"
        class="border p-3 w-full rounded-lg bg-white border-gray-200 outline-none focus:border-gray-500"/>

    </div>
    
    <input type="submit" value="Register" class="bg-blue-500 w-full p-3 text-white uppercase font-bold rounded-lg cursor-pointer"/>


</form>
    </div>

</div>
@endsection
