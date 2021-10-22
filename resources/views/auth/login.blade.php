@extends('layouts.guest')
  
    @section('content')

    <x-auth-session-status class="mb-4" :status="session('status')" />

       <div>
        @if ($errors->any())
            <div>
                 @foreach ($errors->all() as $error)
                     <p class="text-danger font-weight-bold ">{{$error}}</p>
                @endforeach
            </div>
         @endif

        <div class="form-wrapper-auth">
            <form method="POST" action="/login">
                @csrf
                <!-- Email Address -->
                <div class="text-left text-dark ">
                    <label for="email" class="font-weight-bold">Email</label>
                </div>    
                <div class="text-left ">
                    <input id="email" class="form-control-lg w-100 border border-secondary bg-light" 
                    type="email" 
                    name="email" 
                    value="{{old('email')}}" required autofocus />
                </div>
                <!-- Password -->
                <div class="text-left mt-1 text-dark">
                    <label for="password" class="font-weight-bold">Password</label>
                </div>
                <div class="text-left">
                    <input id="password" class="form-control-lg w-100 border border-secondary bg-light"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>
                
                <div class="custom-control custom-checkbox text-left font-weight-bold mt-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                </div>

                <div class="text-right font-weight-light mt-4">
                    @if (Route::has('password.request'))
                        <a  href="{{ route('password.request') }}" class="text-muted mr-3">
                            Forgot your password?
                        </a>
                    @endif
                    <button class="bg-light btn btn-outline-dark font-weight-bold rounded py-1 text-dark px-5" type="submit">
                        LOGIN
                    </button>
                </div>
            </form>
        </div>
        
  

@endsection