@extends('frontend.layouts.master')
@section('title')
    Future Tech || Login
@endsection
@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="active">Forgot Password</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Login Content Area End Here -->
    <div class="page-section mb-60 mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class=" rounded">
                        <!-- Form Container -->
                        <div id="formContainer" class="p-4">
                            <!-- Forget password -->
                            <div class="forgot-password-container">
                                <div class="forgot-password-card">
                                    <!-- Top Icon and Title -->
                                    <div class="icon-box">
                                        <span class="question-mark">?</span>
                                    </div>
                                    <h2 class="title text-center">Forget Password?</h2>
                                    <p class="subtitle text-center">Enter the email address to register with <span
                                            class="brand">F-Tech</span></p>

                                    <!-- Forgot Password Form -->
                                    <form method="POST" action="{{ route('password.email') }}"
                                        class="forgot-password-form">
                                        @csrf
                                        <div class="form-group position-relative">
                                            <i class="fa fa-envelope icon"></i>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Your Email" value="{{ old('email') }}" required>
                                        </div>
                                        <button type="submit" class="btn-square">Send</button>
                                    </form>

                                    <!-- Go to Login -->
                                    <div class="text-center mt-3">
                                        <a href="{{ route('login') }}" class="square-link">Go To Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
