@extends('backend.layouts.master')
@section('title', 'All Pending Products')
@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>All Pending Product</h1>
            {{-- <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">Table</div>
          </div> --}}
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Admin Pending Products</h4>
                            {{-- <div class="card-header-action">
                      <a href="{{route('admin.products.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
                  </div> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                {{ $dataTable->table() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.products.change-status') }}",
                    method: 'put',
                    data: {
                        id: id,
                        status: isChecked
                    },
                    success: function(data) {
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })

            // change is approved status:

            $('body').on('change', '.is_approved', function() {
                let value = $(this).val();
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.change-approve-status') }}",
                    method: 'put',
                    data: {
                        id: id,
                        value: value
                    },
                    success: function(data) {
                        // window.location.reload();
                        toastr.success(data.message)
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
