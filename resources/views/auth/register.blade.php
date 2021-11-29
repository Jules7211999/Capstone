@extends('layouts.guest')
  
    @section('content')

       <div>
        @if ($errors->any())
            <div>
                 @foreach ($errors->all() as $error)
                     <p class="text-danger font-weight-bold">{{$error}}</p>
                @endforeach
            </div>
         @endif    
        
        <form method="POST" action="/register">
            @csrf

            <!-- Name -->
            <div class="text-left text-dark">
                <input id="name" class="form-control-lg w-100  mb-2 bg-light" type="text" placeholder="Name" name="name" value="{{old('name')}}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="text-left text-dark mt-1">
                <input id="email" class="form-control-lg w-100 mb-2 bg-light" placeholder = "Email" type="email" name="email" value="{{old('email')}}" required />
            </div>

            <!-- Password -->
            <div class="text-left text-dark mt-1">
                <input id="password" class="form-control-lg w-100 mb-2 bg-light"
                                type="password"
                                name="password"
                                placeholder="Password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="text-left text-dark mt-1">
                <input id="password_confirmation" class="form-control-lg w-100 mb-2 bg-light"
                                type="password"
                                placeholder="Confirm Password"
                                name="password_confirmation" required />
            </div>

            <!-- role -->
            <div class=" invisible" >
                <input type="text" name="role" value="SuperUser" required />
            </div>


            <div class="text-right">
                <a class="text-dark font-weight-light mr-3" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button class=" btn btn-outline-primary font-weight-bold rounded py-1 text-dark px-5" type="submit">
                        Register
                    </button>
            </div>
        </form>

        
    @endsection