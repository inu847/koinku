@extends('layouts.buyer')

@section('title')
    Detail Product
@endsection

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>Product Details</h1>
                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb pt-0">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Library</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Data</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>


            <div class="col-12 col-md-12 col-xl-12">
                <div class="card mb-4">
                    <div class="card-body">

                        <div class="glide details">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    <li class="glide__slide">
                                        <iframe class="responsive border-0 border-radius img-fluid mb-3" style="height: 500px;width: 100%;" src="{{ json_decode($product->vidio)[0]."/preview"}}"></iframe>
                                    </li>
                                    <li class="glide__slide">
                                        <iframe class="responsive border-0 border-radius img-fluid mb-3" style="height: 500px;width: 100%;" src="{{ json_decode($product->images)[0]."/preview"}}"></iframe>
                                        {{-- @if($product->images)
                                            <img src="{{ asset('storage/'. $product->images) }}" alt="uploaded image" class="responsive border-0 border-radius img-fluid mb-3 rounded mx-auto d-block" />
                                        @else
                                            No avatar
                                        @endif --}}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center">
                            <i id="todo" data-id="0" class="simple-icon-film large-icon m-2"></i>
                            <i id="todo" data-id="1" class="simple-icon-picture large-icon m-2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <h2 class="text-bold">Detail Product</h2>
                        </div>
                        <div class="col-2">
                            <a href="{{route('manage-product.edit', [$product->id])}}"
                                class="btn btn-outline-info btn-sm m-b-5"><i class="simple-icon-pencil"> Edit</i></a>
                        </div>
                    </div>
                        
                    <hr>
                    <div class="tab-pane fade show active">
                        <p class="font-weight-bold">Nama Product</p>
                        <p>{{$product->nama_product}}</p>
                    </div>
                    <div class="tab-pane fade show active">
                        <p class="font-weight-bold">Harga</p>
                        <p>Rp.{{$product->price}}</p>
                    </div>
                    <div class="tab-pane fade show active">
                        <p class="font-weight-bold">Status</p>
                        @if ($product->status == "publish")
                            <span class="badge badge-pill badge-info mb-4">Ready</span>
                        @else
                            <span class="badge badge-pill badge-primary mb -4">Empty</span>
                        @endif                            
                    </div>
                    <div class="tab-pane fade show active">
                        <p class="font-weight-bold">Deskripsi</p>
                        <p>{{$product->deskripsi}}</p>
                    </div>
                </div>
            </div>
        </div>
@endsection

<script src="{{ asset('js/jquery.min.js')}}"></script>
<script>
    $(document).on('click', '#todo', function (e) {
        var id = e.currentTarget.dataset.id
        console.log(id)
    })
</script>