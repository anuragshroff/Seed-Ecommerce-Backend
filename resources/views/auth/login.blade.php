{{--

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>


--}}

@extends('auth.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mb-0" style="border-radius: 20px">
                    <div class="card-body">
                        <div class="p-5">
                            <div class="mb-3 text-center">
                                <img src="{{ asset('assets/images/logo-icon.png') }}" width="60" alt="" />
                            </div>
                            <div class="text-center mb-4">
                                <h5 class="">Welcome To E-POS-PRO</h5>
                                <p class="mb-0">Sign in</p>
                            </div>
                            <div class="form-body">
                                <form class="row g-3" method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="col-12">
                                        <label for="inputEmailAddress" class="form-label">Enter your email
                                            address</label>
                                        <input type="email" class="form-control form-control-lg" name="email"
                                            value="{{ old('email') }}" id="inputEmailAddress" required>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Enter your
                                            password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" class="form-control form-control-lg border-end-0"
                                                name="password" value="{{ old('password') }}" id="inputChoosePassword"> <a
                                                href="javascript:;" class="input-group-text bg-transparent" required><i
                                                    class='bx bx-hide'></i></a>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-end"><a href="{{ route('password.request') }}">Forgot Password
                                            ?</a>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn"
                                                style="background: #00dc82; color: white">Sign in</button>
                                        </div>
                                    </div>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
@endsection
