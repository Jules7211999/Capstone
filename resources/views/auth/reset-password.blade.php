@extends('layouts.guest')
  
    @section('content')

    @if ($errors->any())
            <div>
                 @foreach ($errors->all() as $error)
                     <p class="text-danger font-weight-bold">{{$error}}</p>
                @endforeach
            </div>
         @endif    

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="text-left text-dark">
                <label class="font-weight-bold" for="email">Email</label>
                <input id="email" class="form-control-lg w-100 border border-secondary bg-light" type="email" name="email" value="{{$request->email}}" required autofocus />
            </div>

            <!-- Password -->
            <div class="text-left text-dark">
               <label class="font-weight-bold" for="password">Password</label>
                <input id="password" class="form-control-lg w-100 border border-secondary bg-light" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="text-left text-dark">
                <label class="font-weight-bold" for="password_confirmation">Confirm Password</label>

                <input id="password_confirmation" class="form-control-lg w-100 border border-secondary bg-light"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="class="bg-light btn btn-outline-dark font-weight-bold rounded py-1 text-dark px-5"">
                    Reset Password
                </button>
            </div>
        </form>
@endsection
