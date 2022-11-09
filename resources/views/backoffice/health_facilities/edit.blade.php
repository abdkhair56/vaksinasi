@extends('layouts.main')
<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-12 mb-2 mt-1">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						<h5 class="content-header-title float-left pr-1 mb-0">Edit Health Facilities</h5>
						<div class="breadcrumb-wrapper col-12">
							<ol class="breadcrumb p-0 mb-0">
								<li class="breadcrumb-item">
									<a href="{{route('dashboard.index')}}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item">
									<a href="{{route ('health-facilities.index')}}">Health Facilities</a>
								</li>
								<li class="breadcrumb-item active">
									<a href="#">Edit</a>
								</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content-body">
			<!-- Basic Vertical form layout section start -->
			<section id="basic-vertical-layouts">
			<div class="row match-height">
				<div class="col-md-6 col-12">
					<div class="card">
						
						<div class="card-content">
							<div class="card-body">
								<form class="form form-vertical" action="{{ route ('health-facilities.update', $model->id)}}" method="post">
									@csrf
									<input type="hidden" name="_method" value="put">
									<div class="form-body">
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="name">Health Facilities Name</label>
													<input type="text" id="name" class="form-control" name="name" placeholder="Health Facilities Name" value="{{$model->name}}">
													@error('name')
								                        <div class="alert bg-rgba-warning alert-dismissible mb-2" role="alert">
											              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											                <span aria-hidden="true">×</span>
											              </button>
											              <div class="d-flex align-items-center">
											                <i class="bx bx-error-circle"></i>
											                <span>
											                  {{ $message }}
											                </span>
											              </div>
											            </div>
								                    @enderror
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<label for="name">Phone</label>
													<input type="number" id="name" class="form-control" name="phone" placeholder="081123923819" value="{{$model->phone}}">
													@error('phone')
								                        <div class="alert bg-rgba-warning alert-dismissible mb-2" role="alert">
											              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											                <span aria-hidden="true">×</span>
											              </button>
											              <div class="d-flex align-items-center">
											                <i class="bx bx-error-circle"></i>
											                <span>
											                  {{ $message }}
											                </span>
											              </div>
											            </div>
								                    @enderror
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Address</label>
    												<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{$model->address}}</textarea>
													@error('address')
								                        <div class="alert bg-rgba-warning alert-dismissible mb-2" role="alert">
											              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											                <span aria-hidden="true">×</span>
											              </button>
											              <div class="d-flex align-items-center">
											                <i class="bx bx-error-circle"></i>
											                <span>
											                  {{ $message }}
											                </span>
											              </div>
											            </div>
								                    @enderror
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<label for="first-name-vertical">Cities</label>
													<select class="form-control" name="cities_id">
														@foreach($cities as $data)
														<option value="{{$data->id}}" {{$model->cities_id == $data->id ? 'selected' : ''}}>{{$data->name}}</option>
														@endforeach
													</select>
													@error('cities_id')
								                        <div class="alert bg-rgba-warning alert-dismissible mb-2" role="alert">
											              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											                <span aria-hidden="true">×</span>
											              </button>
											              <div class="d-flex align-items-center">
											                <i class="bx bx-error-circle"></i>
											                <span>
											                  {{ $message }}
											                </span>
											              </div>
											            </div>
								                    @enderror
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<label for="first-name-vertical">vaccination</label>
													<select class="form-control" name="vaccination_id">
														@foreach($vaccination as $data)
														<option value="{{$data->id}}" {{$model->vaccination_id == $data->id ? 'selected' : ''}}>{{$data->name}}</option>
														@endforeach
													</select>
													@error('vaccination_id')
								                        <div class="alert bg-rgba-warning alert-dismissible mb-2" role="alert">
											              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											                <span aria-hidden="true">×</span>
											              </button>
											              <div class="d-flex align-items-center">
											                <i class="bx bx-error-circle"></i>
											                <span>
											                  {{ $message }}
											                </span>
											              </div>
											            </div>
								                    @enderror
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<label for="quota">Quota</label>
													<input type="number" id="quota" class="form-control" name="quota" placeholder="50" value="{{$model->quota}}">
													@error('quota')
								                        <div class="alert bg-rgba-warning alert-dismissible mb-2" role="alert">
											              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											                <span aria-hidden="true">×</span>
											              </button>
											              <div class="d-flex align-items-center">
											                <i class="bx bx-error-circle"></i>
											                <span>
											                  {{ $message }}
											                </span>
											              </div>
											            </div>
								                    @enderror
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<label for="first-name-vertical">Type</label>
													<fieldset>
									                  <div class="radio radio-shadow">
									                      <input type="radio" id="radioshadow1" name="type" value="1" {{ ($model->type == "1") ? "checked" : ""}}>
									                      <label for="radioshadow1">Rumah Sakit</label>
									                  </div>
									                </fieldset>
									                <fieldset>
									                  <div class="radio radio-shadow">
									                      <input type="radio" id="radioshadow2" name="type" value="2" {{ ($model->type == "2") ? "checked" : ""}}>
									                      <label for="radioshadow2">Klinik</label>
									                  </div>
									                </fieldset>
													<fieldset>
									                  <div class="radio radio-shadow">
									                      <input type="radio" id="radioshadow3" name="type" value="3" {{ ($model->type == "3") ? "checked" : ""}}>
									                      <label for="radioshadow3">Puskesmas</label>
									                  </div>
									                </fieldset>
													@error('type')
								                        <div class="alert bg-rgba-warning alert-dismissible mb-2" role="alert">
											              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											                <span aria-hidden="true">×</span>
											              </button>
											              <div class="d-flex align-items-center">
											                <i class="bx bx-error-circle"></i>
											                <span>
											                  {{ $message }}
											                </span>
											              </div>
											            </div>
								                    @enderror
												</div>
											</div>
											<div class="col-12 d-flex justify-content-end">
												<button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			</section>
		</div>
	</div>
</div>