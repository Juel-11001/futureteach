@extends('frontend.layouts.master')
@section('title') Future Tech || Login @endsection
@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="active">Login Register</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Login Content Area -->
                {{-- <div class="page-section mb-60 mt-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6">
                                <div class="toggle-panel shadow-lg rounded">
                                    <!-- Toggle Buttons -->
                                    <div class="toggle-buttons d-flex justify-content-center">
                                        <button id="showLogin" class="toggle-button active">Login</button>
                                        <button id="showRegister" class="toggle-button">Register</button>
                                    </div>
                
                                    <!-- Form Container -->
                                    <div id="formContainer" class="p-4">
                                        <!-- Login Form -->
                                        <form id="loginForm" class="toggle-form" action="#">
                                            <h4 class="text-center mb-4">Welcome Back</h4>
                                            <div class="form-group mb-3">
                                                <label for="loginEmail">Email Address</label>
                                                <input type="email" id="loginEmail" class="form-control" placeholder="Enter your email">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="loginPassword">Password</label>
                                                <input type="password" id="loginPassword" class="form-control" placeholder="Enter your password">
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-3">
                                                <input type="checkbox" id="rememberMe" class="form-check-input small-checkbox" style="width: 20px;">
                                                <label for="rememberMe" class="form-check-label ms-2 pl-3 mt-2">Remember me</label>
                                                <a href="#" class="ms-auto text-decoration-none small-link text-right t-r">Forgot password?</a>
                                            </div>
                                            <div class="col-md-12 lf">
                                                <button class="register-button mt-0 c-p">Login</button>
                                            </div>
                                        </form>
                
                                        <!-- Register Form -->
                                        <form id="registerForm" class="toggle-form" style="display: none;">
                                            <h4 class="text-center mb-4">Create an Account</h4>
                                            <div class="form-group mb-3">
                                                <label for="firstName">First Name</label>
                                                <input type="text" id="firstName" class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="lastName">Last Name</label>
                                                <input type="text" id="lastName" class="form-control" placeholder="Last Name">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="registerEmail">Email Address</label>
                                                <input type="email" id="registerEmail" class="form-control" placeholder="Enter your email">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="registerPassword">Password</label>
                                                <input type="password" id="registerPassword" class="form-control" placeholder="Enter your password">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="confirmPassword">Confirm Password</label>
                                                <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm your password">
                                            </div>
                                            <div class="col-12 lf">
                                                <button class="register-button mt-0 c-p ">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Login Content Area End Here -->
                <div class="page-section mb-60 mt-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8 col-lg-6">
                                <div class="toggle-panel shadow-lg rounded">
                                    <!-- Toggle Buttons -->
                                    <div class="toggle-buttons d-flex justify-content-center mb-3">
                                        <button id="showLogin" class="toggle-button active">Login</button>
                                        <button id="showRegister" class="toggle-button">Signup</button>
                                    </div>
                
                                    <!-- Form Container -->
                                    <div id="formContainer" class="p-4">
                                        <!-- Login Form -->
                                        <form action="{{route('login')}}" method="POST" id="loginForm" class="toggle-form">
                                            @csrf
                                            <div class="form-group mb-3 position-relative">
                                                <i class="icon fa fa-user"></i>
                                                <input type="email" id="loginEmail" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                                            </div>
                                            <div class="form-group mb-3 position-relative">
                                                <i class="icon fa fa-lock"></i>
                                                <input type="password" id="loginPassword" class="form-control" placeholder="Password" name="password" value="{{old('password')}}">
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="form-check d-flex align-items-center">
                                                    <input type="checkbox" id="rememberMe" class="form-check-input small-checkbox mt-1" name="remember" checked>
                                                    <label for="rememberMe" class="form-check-label">Remember Me</label>
                                                </div>
                                                <a href="{{ route('password.request') }}" class="text-decoration-none small-link text-danger">Forgot Password?</a>
                                            </div>
                                            <button class="btn btn-primary w-100">Login</button>
                                        </form>
                
                                        <!-- Signup Form -->
                                        <form id="registerForm" class="toggle-form" style="display: none;" action="{{route('register')}}" method="POST">
                                            @csrf
                                            <div class="form-group mb-3 position-relative">
                                                <i class="icon fa fa-user"></i>
                                                <input type="text" id="firstName" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                                            </div>
                                            <div class="form-group mb-3 position-relative">
                                                <i class="icon fa fa-envelope"></i>
                                                <input type="email" id="registerEmail" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                                            </div>
                                            <div class="form-group mb-3 position-relative">
                                                <i class="icon fa fa-lock"></i>
                                                <input type="password" id="registerPassword" class="form-control" placeholder="Password" name="password">
                                            </div>
                                            <div class="form-group mb-3 position-relative">
                                                <i class="icon fa fa-lock"></i>
                                                <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                                            </div>
                                            <button class="btn btn-primary w-100">Signup</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
@endsection
