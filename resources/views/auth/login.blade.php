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
                <div class="text-left mb-3">
                    <input id="email" class="form-control-lg w-100 bg-light" 
                    type="email" 
                    name="email"
                    placeholder="Email"
                    value="{{old('email')}}" required autofocus />
                </div>
                <!-- Password -->
                <div class="text-left">
                    <input id="password" class="form-control-lg w-100  bg-light"
                                    type="password"
                                    name="password"
                                    placeholder="Password"
                                    required autocomplete="current-password" />
                </div>
                
                <div class="custom-control custom-checkbox text-left font-weight-bold mt-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                </div>

                <div class="text-right font-weight-light mt-4">
                    <a href="/register" ><span class="text-secondary">Create an Account</span></a>
                    <span>|</span>
                    @if (Route::has('password.request'))
                        <a  href="{{ route('password.request') }}" class="text-muted mr-3">
                            Forgot your password?
                        </a>
                    @endif
                    <button class=" btn btn-outline-primary font-weight-bold rounded py-1 text-dark px-5" type="submit">
                        LOGIN
                    </button>
                </div>
            </form>
        </div>
        
  

@endsection