@extends('layouts.buyer')

@section('title')
    Inkapps (Inklusi Keuangan Application)
@endsection

@section('content')
	@foreach ($user as $data)
		@if (App\Models\Roles::where('user_id', $data->id)->first()->role == "super")
			<div class="col-lg-12">
				<a href="{{ route('shoping', [$data->id]) }}">
				{{-- <a data-toggle="modal" data-target="#exampleModalContent"> --}}
					<div class="card mb-4 progress-banner" style="height: 120px;">
						<div class="card-body justify-content-between d-flex flex-row align-items-center">
							<div class="row">
								<div class="col-4">
									<i class="iconsminds-shop-4 mr-2 text-white align-text-bottom d-inline-block"></i>
								</div>
								<div class="col-8">
									<p class="lead text-white">{{ $data->nama_umkm }}</p>
									<p class="text-small text-white">{{ $data->username }}</p>
								</div>
							</div>
							<div>
								@if (!$data->job)
									<a href="#" class="btn btn-warning btn-sm mb-2">Lowongan Kerja</a>
								@endif
								<div class="col-12 col-xs-6">
									<div class="form-group mb-1">
										@if ($data->suggestion)
											<select class="rating" data-current-rating="{{$pembulatan_rating}}" data-readonly="true">
										@else
											<select class="rating" data-current-rating="1" data-readonly="true">
										@endif
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>		
			
			<div class="modal fade" id="exampleModalContent" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<img src="{{asset('img/LOGO 4.png')}}" alt="" style="height: 50px;">
							<h5 class="mt-3">Masukkan Data Pemesan</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="#" method="POST">
							<div class="modal-body">
								@csrf
								<div class="form-group">
									<label for="" class="col-form-label">Nama</label>
									<input name="buyer" type="text" class="form-control">
								</div>	
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>	
		@endif
	@endforeach
@endsection
