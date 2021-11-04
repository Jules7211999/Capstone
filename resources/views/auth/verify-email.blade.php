@extends('layouts.guest')
  
    @section('content')

        <div class="font-weight-bold">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="success-text">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div>
            
            <div class="mt-3 row justify-content-center">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <button type="submit" class=" btn btn-outline-primary font-weight-bold rounded py-1 text-dark px-5">
                            Resend Verification Email
                        </button>
                    </form>
                    
                  
                        @csrf
                        
                        <a href="/logout">
                            <button type="submit" class="border-0 text-dark bg-light m-1">
                                <u>Logout</u>
                            </button>
                        </a>
                   
                </div>
        </div>
@endsection