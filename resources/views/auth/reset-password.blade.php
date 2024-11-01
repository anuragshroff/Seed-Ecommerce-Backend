{{--

<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

--}}





@extends('auth.master')

@section('content')
    <div class="card forgot-box col-md-5">
        <div class="card-body">



            <form method="POST" action="{{ route('password.store') }}">

                @csrf

                 <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="p-3">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/icons/forgot-2.png') }}" width="100" alt="" />
                    </div>
                    <h4 class="mt-5 font-weight-bold">Reset Password?</h4>



                    <div class="my-4">

                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $request->email) }}" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="my-4">

                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="my-4">

                        <label for="password_confirmation"  class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" name="password_confirmation" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>


                    <div class="d-grid gap-2">
                        <button type="submit" class="btn" style="background: #00dc82; color: white">Reset Password</button>

                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
