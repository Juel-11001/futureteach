@extends('backend.layouts.master')
@section('content')
<!-- Main Content -->
<section class="section">
  <div class="section-header">
    <h1>Category</h1>
  </div>
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Update Category</h4>
            <div class="card-header-action">
              <a href="{{ route('admin.category.index') }}" class="btn btn-primary"><i class="fas fa-caret-left mr-1 icon-align"></i> Back</a>
            </div>
          </div>
          <div class="card-body">
            <form action="{{route('admin.category.update', $category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

              <!-- Toggle Buttons for Icon and Image -->
              <div class="form-group">
                <label>Type</label>
                <div>
                  <button type="button" id="iconToggle" class="btn btn-primary"><i class="fas fa-icons"></i> Icon</button>
                  <button type="button" id="imageToggle" class="btn btn-secondary"><i class="fas fa-image"></i> Image</button>
                </div>
              </div>

              <!-- Icon Field -->
              <div class="form-group" id="iconField">
                <label class="mr-2">Icon</label>
                <button class="btn btn-primary" data-icon="{{ $category->icon }}" data-selected-class="btn-danger" data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
              </div>

              <!-- Image Field (Initially Hidden) -->
              <div class="row" id="imageField" style="display: none;">
                <div class="form-group col-md-12 d-flex flex-column">
                  <label>Image</label>
                  <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group col-md-6">
                  <label class="mr-5">Preview</label>
                  <img src="{{asset($category->image)}}" alt="Image Preview" width="120px" style="">
                </div>
            </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" value="{{$category->name}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Status</label>
                  <select id="inputState" class="form-control" name="status">
                    <option {{$category->status==1 ? 'selected' : ''}} value="1">Active</option>
                    <option {{$category->status==0 ? 'selected' : ''}} value="0">Inactive</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        initializeCategoryForm();
    });
    document.addEventListener('DOMContentLoaded', function () {
        // DOM Elements
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');

        // Handle image preview on file input change
        imageInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result; // Update preview with new image
                };
                reader.readAsDataURL(this.files[0]); // Read selected file
            }
        });
    });
</script>
@endpush

