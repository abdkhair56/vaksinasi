@extends('layouts.main')
@section('main-content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h5 class="content-header-title float-left pr-1 mb-0">Health Facilities</h5>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb p-0 mb-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active">Health Facilities
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                              <h5 class="card-title">Health Facilities</h5>
                              <div class="heading-elements">
                                  <a href="{{ route('health-facilities.create') }}" class="btn btn-primary glow invoice-create" role="button" aria-pressed="true"><i class="bx bx-add-to-queue mr-50"></i> Create Health Facilities</a>
                              </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Quota</th>
                                                    <th>Vaccination</th>
                                                    <th>City</th>
                                                    <th>Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Zero configuration table -->
        </div>
    </div>
</div>
@endsection
@push('javascript')
<script>
    $('#datatable').DataTable({
        responsive : true,
        processing : true,
        serverSide : true,
        ajax: "{{ route('health-facilities.data.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
            {data : 'name', name : 'name'},
            {data : 'phone', name : 'phone'},
            {data : 'address', name : 'address'},
            {data : 'quota', name : 'quota'},
            {data : 'vaccination', name : 'vaccination'},
            {data : 'cities', name : 'cities'},
            {data : 'type', name : 'type'},
            {data : 'action', name : 'action'}
        ]
    });
</script>
@endpush