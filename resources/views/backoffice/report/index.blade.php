@extends('layouts.main')
@section('main-content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h5 class="content-header-title float-left pr-1 mb-0">Report</h5>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb p-0 mb-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active">Report
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
                              <h5 class="card-title">Report</h5>
                              <div class="heading-elements">
                                  <div class="row mb-2">
                                      <div class="col-4">
                                          <div class="form-group">
                                              <select class="form-control" name="cities" id="cities">
                                                  @foreach($cities as $data)
                                                  <option value="{{$data->id}}">{{$data->name}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-4">
                                          <div class="form-group">
                                              <select class="form-control" name="province" id="province">
                                                  @foreach($province as $data)
                                                  <option value="{{$data->id}}">{{$data->name}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-2 text-right  ">
                                          <button type="button" class="btn btn-primary glow invoice-create" id="filter" name="filter"> Filter</button>
                                      </div>
                                      <div class="col-2">
                                          <button type="button" class="btn btn-primary glow invoice-create" id="reset" name="reset"> Reset</button>
                                      </div>
                                  </div>
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
    fill_datatable();
    function fill_datatable(cities = '', province = ''){
        var dataTable = $('#datatable').DataTable({
            responsive : true,
            processing : true,
            serverSide : true,
            ajax: {
                url: "{{ route('report.index') }}",
                data: {province:province, cities:cities}
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {data : 'name', name : 'name'},
                {data : 'phone', name : 'phone'},
                {data : 'address', name : 'address'},
                {data : 'quota', name : 'quota'},
                {data : 'vaccination', name : 'vaccination'},
                {data : 'cities', name : 'cities'},
                {data : 'type', name : 'type'}
            ]
        });
    }

    $('#filter').click(function() {
        var cities = $('#cities').val();
        var province = $('#province').val();

        if (cities != '' || province != '') {
            $('#datatable').DataTable().destroy();
            fill_datatable(cities, province);
        } else {
            alert('test');
        }
    });

    $('#reset').click(function() {
        $('#cities').val('');
        $('#province').val('');
        $('#province').val('');
        $('#datatable').DataTable().destroy();
        fill_datatable();
    })
</script>
@endpush