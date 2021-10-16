@extends('layouts.guest')
  
    @section('content')

    @if ($errors->any())
            <div>
                 @foreach ($errors->all() as $error)
                     <p class="error-text">{{$error}}</p>
                @endforeach
            </div>
         @endif    

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <label for="email">Email</label>
                <input id="email" class="form-control-lg w-100 border border-secondary bg-light" type="email" name="email" value="{{$request->email}}" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
               <label for="password">Password</label>
                <input id="password" class="form-control-lg w-100 border border-secondary bg-light" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation">Confirm Password</label>

                <input id="password_confirmation" class="form-control-lg w-100 border border-secondary bg-light"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button>
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
@endsection
