@extends('layouts.main')
<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-12 mb-2 mt-1">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						<h5 class="content-header-title float-left pr-1 mb-0">Edit Provinces</h5>
						<div class="breadcrumb-wrapper col-12">
							<ol class="breadcrumb p-0 mb-0">
								<li class="breadcrumb-item">
									<a href="{{route('dashboard.index')}}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item">
									<a href="{{route ('provinces.index')}}">Provinces</a>
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
								<form class="form form-vertical" action="{{ route ('provinces.update', $model->id)}}" method="post">
									@csrf
									<input type="hidden" name="_method" value="put">
									<div class="form-body">
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="name">Name</label>
													<input type="text" id="name" class="form-control" name="name" placeholder="Hospital Name" value="{{ @old('name') ? @old('name') : $model->name }}">
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