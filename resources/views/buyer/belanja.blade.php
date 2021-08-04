@extends('layouts.buyer')

@section('title')
    {{$user->nama_umkm}}
@endsection

@section('body')
	<body id="app-container" class="menu-main-hidden show-spinner">
@endsection

@section('menu')
	<div class="menu">
		<div class="main-menu">
			<div class="scroll">
				<ul class="list-unstyled">
					<li class="active">
						<a href="#menu">
							
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="sub-menu">
            <div class="container">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Total Harga</label>
                        <input type="number" value="0" class="form-control" readonly>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">Checkout</button>
                    <div class="scroll">
                        <ul class="list-unstyled" data-link="menu" id="pesanan"></ul>
                    </div>
                </form>
            </div>
        </div>
	</div>
@endsection

@section('content')
            <div class="container-fluid disable-text-selection">
                <div class="alert alert-success">
                    @auth('user') 
                        <div>Selamat Datang {{ Auth::guard('user')->user()->name }} Silahkan Memesan Di Daftar Menu Yang Tersedia!!</div>
                    @endauth
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="col-lg-12">
                            <a href="#">
                                <div class="card mb-4 progress-banner">
                                    <div class="card-body justify-content-between d-flex flex-row align-items-center">
                                        <div class="row">
                                            <div class="col-4">
                                                <i class="iconsminds-shop-4 mr-2 text-white align-text-bottom d-inline-block"></i>
                                            </div>
                                            <div class="col-8">
                                                <p class="lead text-white">{{ $user->nama_umkm }}</p>
                                                <p class="text-small text-white">{{ $user->username }}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col-12 col-xs-6">
                                                <div class="form-group mb-1">
                                                    <select class="rating" data-current-rating="3" data-readonly="true">
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

                        <div class="mb-2">
                            <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions" role="button" aria-expanded="true" aria-controls="displayOptions">
                                Display Options
                                <i class="simple-icon-arrow-down align-middle"></i>
                            </a>
                            <div class="collapse d-md-block" id="displayOptions">
                                <span class="mr-3 mb-2 d-inline-block float-md-left">
                                    <a href="#" class="mr-2 view-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
                                            <path class="view-icon-svg" d="M17.5,3H.5a.5.5,0,0,1,0-1h17a.5.5,0,0,1,0,1Z" />
                                            <path class="view-icon-svg" d="M17.5,10H.5a.5.5,0,0,1,0-1h17a.5.5,0,0,1,0,1Z" />
                                            <path class="view-icon-svg" d="M17.5,17H.5a.5.5,0,0,1,0-1h17a.5.5,0,0,1,0,1Z" />
                                        </svg>
                                    </a>
                                    <a href="#" class="mr-2 view-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
                                            <path class="view-icon-svg" d="M17.5,3H6.5a.5.5,0,0,1,0-1h11a.5.5,0,0,1,0,1Z" />
                                            <path class="view-icon-svg" d="M3,2V3H1V2H3m.12-1H.88A.87.87,0,0,0,0,1.88V3.12A.87.87,0,0,0,.88,4H3.12A.87.87,0,0,0,4,3.12V1.88A.87.87,0,0,0,3.12,1Z" />
                                            <path class="view-icon-svg" d="M3,9v1H1V9H3m.12-1H.88A.87.87,0,0,0,0,8.88v1.24A.87.87,0,0,0,.88,11H3.12A.87.87,0,0,0,4,10.12V8.88A.87.87,0,0,0,3.12,8Z" />
                                            <path class="view-icon-svg" d="M3,16v1H1V16H3m.12-1H.88a.87.87,0,0,0-.88.88v1.24A.87.87,0,0,0,.88,18H3.12A.87.87,0,0,0,4,17.12V15.88A.87.87,0,0,0,3.12,15Z" />
                                            <path class="view-icon-svg" d="M17.5,10H6.5a.5.5,0,0,1,0-1h11a.5.5,0,0,1,0,1Z" />
                                            <path class="view-icon-svg" d="M17.5,17H6.5a.5.5,0,0,1,0-1h11a.5.5,0,0,1,0,1Z" />
                                        </svg>
                                    </a>
                                    <a href="#" class="mr-2 view-icon active">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
                                            <path class="view-icon-svg" d="M7,2V8H1V2H7m.12-1H.88A.87.87,0,0,0,0,1.88V8.12A.87.87,0,0,0,.88,9H7.12A.87.87,0,0,0,8,8.12V1.88A.87.87,0,0,0,7.12,1Z" />
                                            <path class="view-icon-svg" d="M17,2V8H11V2h6m.12-1H10.88a.87.87,0,0,0-.88.88V8.12a.87.87,0,0,0,.88.88h6.24A.87.87,0,0,0,18,8.12V1.88A.87.87,0,0,0,17.12,1Z" />
                                            <path class="view-icon-svg" d="M7,12v6H1V12H7m.12-1H.88a.87.87,0,0,0-.88.88v6.24A.87.87,0,0,0,.88,19H7.12A.87.87,0,0,0,8,18.12V11.88A.87.87,0,0,0,7.12,11Z" />
                                            <path class="view-icon-svg" d="M17,12v6H11V12h6m.12-1H10.88a.87.87,0,0,0-.88.88v6.24a.87.87,0,0,0,.88.88h6.24a.87.87,0,0,0,.88-.88V11.88a.87.87,0,0,0-.88-.88Z" />
                                        </svg>
                                    </a>
                                </span>
                                <div class="d-block d-md-inline-block">
                                    <div class="btn-group float-md-left mr-1 mb-1">
                                        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Order By
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                        </div>
                                    </div>
                                    <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                                        <input placeholder="Search...">
                                    </div>
                                </div>
                                <div class="float-md-right">
                                    <span class="text-muted text-small">Displaying 1-10 of 210 items </span>
                                    <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        20
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item active" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                        <a class="dropdown-item" href="#">50</a>
                                        <a class="dropdown-item" href="#">100</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator mb-5"></div>
                    </div>
                </div>
            
            
                    <div class="row list disable-text-selection" data-check-all="checkAll">
                        @foreach ($products as $product)
                        <div class="col-xl-4 col-lg-4 col-12 col-sm-6 mb-4">
                            <div class="card">
                                <div class="position-relative">
                                    <a href="Pages.Product.Detail.html">
                                        @if($product->images)
                                        <div class="side_view">
                                            <img src="{{ asset('storage/'.$product->images)}}" alt="Card image cap" class="card-img-top" style="height: 200px;" />
                                        </div>
                                        @else
                                            No avatar
                                        @endif
                                    </a>
                                    @if ($product->created_at->format('m, y') == date('m, y'))
                                        <span class="badge badge-pill badge-theme-1 position-absolute badge-top-left">NEW</span>
                                    @elseif ("a" == "a")
                                        <span class="badge badge-pill badge-secondary position-absolute badge-top-left">TRENDING</span>
                                    @endif

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="#">
                                                <p class="list-item-heading mb-4 pt-1">{{ Str::limit($product->nama_product, 40) }}</p>
                                            </a>
                                            <div class="row">
                                                <div class="col-7 mb-3">
                                                    <p class="price-per-pallet text-muted mb-0 font-weight-light">Rp.{{ $product->price }}</p>
                                                </div>
                                            </div>
                                            <footer>
                                                <a class="btn btn-primary btn-block mb-1" href="javascript:void(0)" id="addtocart" data-id="{{ $product->id }}" data-name="{{ $product->nama_product }}" data-price="{{ $product->price }}"><i class="iconsminds-add-cart"></i>Add To cart </a>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    let id = ""

    $(document).on('click', '#addtocart', function(e) {
        let getid = e.currentTarget.dataset.id;
        let name = e.currentTarget.dataset.name;
        let price = e.currentTarget.dataset.price;

        var list = `
                    <div class="form-group mb-2">
                        <div class="container">
                            <div class="row">
                                <label for="" class="col-md-6">`+name+`</label>
                                <p class="col-md-6" id="price">`+price+`</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center" id="count">
                                <button type="button" class="btn btn-primary btn-xs default" data-id="`+getid+`" id="kurang">-</button>
                                <input type="number" class="col-md-4 text-center" value="1" id="`+getid+`" readonly>
                                <button type="button" class="btn btn-primary btn-xs default" data-id="`+getid+`" id="tambah">+</button>
                            </div>
                        </div>
                    </div>`
        
        let status = true
        for (let i = 0; i < id.length; i++) {
            if (id[i] == getid) {
                // console.log(id[i])
                status = false
                let jumlah = $('#'+getid+'').val()
                jumlah++
                $('#'+getid+'').val(jumlah)
                break
            }
        }
        
        if (status == true) {
            $('#pesanan').append(list)
            id += getid
        }
        let harga = $('#price').text()
    })

    $(document).on('click', '#tambah', function(e){
        let getid = e.currentTarget.dataset.id;
        let jumlah = $('#'+getid+'').val()
        jumlah++
        $('#'+getid+'').val(jumlah)
    })

    $(document).on('click', '#kurang', function(e){
        let getid = e.currentTarget.dataset.id;
        let jumlah = $('#'+getid+'').val()
        jumlah--
        $('#'+getid+'').val(jumlah)
    })

    $(document).on('change', '#price', function (){
        $('#price').each(function () {
            console.log($(this).text())
        })
    })
</script>