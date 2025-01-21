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
                      <h4>Create Category</h4>
                      <div class="card-header-action">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-primary"><i
                                class="fas fa-caret-left mr-1 icon-align"></i> Back</a>
                    </div>
                    </div>
                     <div class="card-body">
                      <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                          @csrf

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
                              <button class="btn btn-primary" data-selected-class="btn-danger"
                              data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
                          </div>

                          <!-- Image Field (Initially Hidden) -->
                          <div class="form-group" id="imageField" style="display: none;">
                              <label>Image</label>
                              <input type="file" class="form-control" name="image">
                          </div>

                          <div class="row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control" name="status">
                                  <option value="1">Active</option>
                                  <option value="0">Inactive</option>
                                </select>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary mt-3">Create</button>
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
</script>
@endpush


