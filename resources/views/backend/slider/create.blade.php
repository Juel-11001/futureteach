@extends('backend.layouts.master')
@section('content')
     <!-- Main Content -->

        <section class="section">
          <div class="section-header">
            <h1>Slider</h1>
            {{-- <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Table</div>
            </div> --}}
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Slider</h4>
                    <div class="card-header-action">
                        <a href="{{route('admin.slider.index')}}" class="btn btn-primary"><i class="fas fa-caret-left mr-1 icon-align"></i> Back</a>
                    </div>
                  </div>
                   <div class="card-body">
                    <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" value="{{old('type')}}">
                      </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                      </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Starting Price</label>
                            <input type="text" class="form-control" name="starting_price" value="{{old('starting_price')}}">
                          </div>
                          <div class="form-group col-md-6 ">
                            <label>Serial</label>
                            <input type="number" class="form-control" name="serial" value="{{old('serial')}}">
                          </div>
                    </div>

                    <div class="form-group">
                        <label>Button Url</label>
                        <input type="text" class="form-control" name="btn_url" value="{{old('btn_url')}}">
                      </div>
                    
                      <div class="row">
                      <div class="form-group col-md-6" >
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                    <div class="form-group col-md-6">
                        <label>Banner</label>
                        <input type="file" class="form-control" name="banner">
                      </div>
                    </div>
                      <button type="submit" class="btn btn-primary mt-3" >Create</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </section>

@endsection
