@extends('frontend.dashboard.layouts.master')
@section('title') Profile || Future Teach @endsection
@section('content')
      <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
      {{-- <div class="dashboard_sidebar">
        <span class="close_icon">
          <i class="far fa-bars dash_bar"></i>
          <i class="far fa-times dash_close"></i>
        </span>
        <a href="dsahboard.html" class="dash_logo"><img src="images/logo.png" alt="logo" class="img-fluid"></a>
        <ul class="dashboard_link">
          <li><a href="dsahboard.html"><i class="fas fa-tachometer"></i>Dashboard</a></li>
          <li><a href="dsahboard_order.html"><i class="fas fa-list-ul"></i> Orders</a></li>
          <li><a href="dsahboard_download.html"><i class="far fa-cloud-download-alt"></i> Downloads</a></li>
          <li><a href="dsahboard_review.html"><i class="far fa-star"></i> Reviews</a></li>
          <li><a href="dsahboard_wishlist.html"><i class="far fa-heart"></i> Wishlist</a></li>
          <li><a class="active" href="dsahboard_profile.html"><i class="far fa-user"></i> My Profile</a></li>
          <li><a href="dsahboard_address.html"><i class="fal fa-gift-card"></i> Addresses</a></li>
          <li><a href="#"><i class="far fa-sign-out-alt"></i> Log out</a></li>
        </ul>
      </div> --}}
      @include('frontend.dashboard.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <h4>basic information</h4>

                  <div class="row">
                    <div class="col-xl-9">
                        <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                      <div class="row">
                        <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-user-tie"></i>
                            <input type="text" placeholder="Name" name="name" value="{{Auth::user()->name}}">
                          </div>
                        </div>
                        {{-- <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-user-tie"></i>
                            <input type="text" placeholder="Last Name">
                          </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="far fa-phone-alt"></i>
                            <input type="text" placeholder="Phone">
                          </div>
                        </div> --}}
                        <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fal fa-envelope-open"></i>
                            <input type="email" name="email" placeholder="Email" value="{{Auth::user()->email}}">
                          </div>
                        </div>
                        {{-- <div class="col-xl-12">
                          <div class="wsus__dash_pro_single">
                            <textarea cols="3" rows="5" placeholder="About You"></textarea>
                          </div>
                        </div>
                        <div class="col-xl-12">
                          <div id="medicine_row3">
                            <div class="row">
                              <div class="col-xl-5 col-md-5">
                                <div class="medicine_row_input">
                                  <input type="text" placeholder="www.facebook.com" name="name[]">
                                </div>
                              </div>
                              <div class="col-xl-5 col-md-5">
                                <div class="medicine_row_input">
                                  <input type="text" placeholder="www.youtube.com" name="name[]">
                                </div>
                              </div>
                              <div class="col-xl-2 col-md-2">
                                <div class="medicine_row_input">
                                  <button type="button" id="add_row3"><i class="fas fa-plus"
                                      aria-hidden="true"></i></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> --}}
                      </div>
                      <div class="col-xl-4">
                      <button class="common_btn mb-4 mt-2" type="submit">upload</button>
                    </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-md-6">
                      <div class="wsus__dash_pro_img">
                        <img src="{{Auth::user()->image ? asset(Auth::user()->image) : asset('uploads/no_image.jpg')}}" alt="img" class="img-fluid w-100">
                        <input type="file" name="image">
                      </div>
                    </div>
                </form>
                    {{-- <div class="col-xl-12">
                      <button class="common_btn mb-4 mt-2" type="submit">upload</button>
                    </div> --}}
                    <div class="wsus__dash_pass_change mt-2">
                        <form action="{{route('user.profile.update.password')}}" method="post">
                            @csrf
                            <h4>Update Password </h4>
                      <div class="row">
                        <div class="col-xl-4 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-unlock-alt"></i>
                            <input type="password" placeholder="Current Password" name="current_password">
                          </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-lock-alt"></i>
                            <input type="password" placeholder="New Password" name="password">
                          </div>
                        </div>
                        <div class="col-xl-4">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-lock-alt"></i>
                            <input type="password" placeholder="Confirm Password" name="password_confirmation">
                          </div>
                        </div>
                        <div class="col-xl-12">
                          <button class="common_btn" type="submit">upload</button>
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->
@endsection