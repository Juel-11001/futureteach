@extends('backend.layouts.master')
@section('title') Profile Update @endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
      </div>
    </div>
    <div class="section-body">
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
            
          <div class="card">
            <form method="post" class="needs-validation" novalidate="" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                @csrf
              <div class="card-header">
                <h4>Update Profile</h4>
            </div>
            <div class="col-12 col-md-6 col-lg-7 col-xl-7">
                <img alt="image" width="100px" src="{{asset(Auth::user()->image)}}">
            </div>
              <div class="card-body">
                  <div class="row">                               
                    <div class="form-group  col-12 col-md-6 col-lg-6 col-xl-6">
                      <label>Name</label>
                      <input type="text" class="form-control" value="{{Auth::user()->name}}" required="" name="name">
                      <div class="invalid-feedback">
                        Please fill in the name
                      </div>
                    </div>

                    <div class="form-group col-md-6 col-lg-6 col-xl-6 col-12">
                      <label>Email</label>
                      <input type="email" class="form-control" value="{{Auth::user()->email}}" required="" name="email">
                      <div class="invalid-feedback">
                        Please fill in the email
                      </div>
                    </div>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="image">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">

              <form action="{{route('admin.update.password')}}" method="post" class="needs-validation" novalidate="">
                  @csrf
                <div class="card-header">
                  <h4>Update Password</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                        <label>Current Password</label>
                        <input type="password" class="form-control" name="current_password" value="" >
                        <div class="invalid-feedback">
                          Please fill in the Currentt password
                        </div>
                      </div>
                      <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password" value="" >
                        <div class="invalid-feedback">
                          Please fill in the name
                        </div>
                      </div>
                      <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                        <label>Confirme Password</label>
                        <input type="password" class="form-control" name="password_confirmation" value="" >
                        <div class="invalid-feedback">
                          Please fill in the name
                        </div>
                      </div>

                    </div>

                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection