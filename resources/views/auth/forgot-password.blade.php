{{--

<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>

            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>


--}}









@extends('auth.master')

@section('content')
    <div class="card forgot-box col-md-5">
        <div class="card-body">



            <form method="POST" action="{{ route('password.email') }}">

                @csrf

                <div class="p-3">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/icons/forgot-2.png') }}" width="100" alt="" />
                    </div>
                    <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>

                    Forgot your password? No problem. Just let us know your email address and we will email you a password
                    reset link that will allow you to choose a new one.


                    <div class="my-4">

                        <label class="form-label">Enter your registered email ID to reset the password</label>
                        <x-input-label for="email" :value="__('Email')" />
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" style="color: green" />
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn" style="background: #00dc82; color: white">Email Password Reset
                            Link</button>
                        <a href="{{ route('login') }}" class="btn btn-light"><i class='bx bx-arrow-back me-1'></i>Back to
                            Login</a>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
