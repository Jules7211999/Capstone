@extends('layouts.guest')
  
    @section('content')

       <div>
        @if ($errors->any())
            <div>
                 @foreach ($errors->all() as $error)
                     <p class="error-text">{{$error}}</p>
                @endforeach
            </div>
         @endif    
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="text-left text-dark">
                <label class="font-weight-bold" for="name">Name</label>

                <input id="name" class="form-control-lg w-100 border border-secondary bg-light" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="text-left text-dark mt-1">
               <label class="font-weight-bold" for="emai">Email</label>

                <input id="email" class="form-control-lg w-100 border border-secondary bg-light" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="text-left text-dark mt-1">
               <label class="font-weight-bold" for="password">Password</label>

                <input id="password" class="form-control-lg w-100 border border-secondary bg-light"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="text-left text-dark mt-1">
                <label class="font-weight-bold" for="password_confirmation">Confirm Password</label>

                <input id="password_confirmation" class="form-control-lg w-100 border border-secondary bg-light"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <!-- role -->
            <div class=" invisible" >
                <input type="text" name="role" value="Admin" required />
            </div>


            <div class="text-right">
                <a class="text-dark font-weight-light mr-3" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button class="font-weight-bold rounded py-1 text-dark px-5 btn-custom border-0" type="submit">Register</button>
            </div>
        </form>

    @endsection