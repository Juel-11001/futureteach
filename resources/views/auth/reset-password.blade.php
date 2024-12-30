{{-- <x-guest-layout>
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
</x-guest-layout> --}}
@extends('frontend.layouts.master')
@section('title')
    Reset Password
@endsection
@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="active">Reset Password</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Change Password Content Area -->
    <div class="page-section mb-60 mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class=" rounded">
                        <!-- Form Container -->
                        <div id="formContainer" class="p-4">
                            <!-- Change password -->
                            <div class="forgot-password-container">
                                <div class="forgot-password-card">
                                    <!-- Top Icon and Title -->
                                    {{-- <div class="icon-box">
                                        <span class="question-mark">?</span>
                                    </div> --}}
                                    <h4 class="title-reset">Reset Password?</h4>
                                    {{-- <p class="subtitle text-center">Enter the email address to register with <span
                                            class="brand">F-Tech</span></p> --}}

                                    <!-- Forgot Password Form -->
                                    <form method="POST" action="{{ route('password.store') }}"
                                        class="forgot-password-form">
                                        @csrf
                                        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        <div class="form-group position-relative">
                                            <i class="fa fa-envelope icon"></i>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Your Email" value="{{ old('email', $request->email) }}" required>
                                        </div>
                                        <div class="form-group position-relative">
                                            <i class="icon fa fa-lock"></i>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="New Password">
                                        </div>
                                        <div class="form-group position-relative">
                                            <i class="icon fa fa-lock"></i>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                placeholder="Confirm Password">
                                        </div>

                                        <button type="submit" class="btn-square">Submit</button>
                                    </form>

                                    {{-- <!-- Go to Login -->
                                    <div class="text-center mt-3">
                                        <a href="{{ route('login') }}" class="square-link">Go To Login</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
