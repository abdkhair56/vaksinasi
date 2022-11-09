@extends('layouts.main')
<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-12 mb-2 mt-1">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						<h5 class="content-header-title float-left pr-1 mb-0">Create vaccination</h5>
						<div class="breadcrumb-wrapper col-12">
							<ol class="breadcrumb p-0 mb-0">
								<li class="breadcrumb-item">
									<a href="{{route('dashboard.index')}}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item">
									<a href="{{route ('vaccination.index')}}">vaccination</a>
								</li>
								<li class="breadcrumb-item active">
									<a href="#">Create</a>
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
								<form class="form form-vertical" action="{{route ('vaccination.store')}}" method="POST">
									@csrf
									<div class="form-body">
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="name">Vaccination Name</label>
													<input type="text" id="name" class="form-control" name="name" placeholder="Vaccination Name" value="{{@old('name')}}">
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