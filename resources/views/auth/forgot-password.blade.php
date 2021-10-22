
@extends('layouts.guest')

@section('content')


        <div class="mb-4 font-weight-bold text-dark">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div>
        @if ($errors->any())
            <div>
                 @foreach ($errors->all() as $error)
                     <p class="text-danger font-weight-bold">{{$error}}</p>
                @endforeach
            </div>
         @endif


        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="text-dark font-weight-bold">Email</label>

                <input id="email" class="form-control-lg w-100 border border-dark bg-light" type="email" name="email" required autofocus />
            </div>

            <div>
                <button class="bg-light btn btn-outline-dark font-weight-bold rounded py-1 text-dark px-5 mt-3">
                    Email Password Reset Link
                </button>
            </div>
        </form>
@endsection