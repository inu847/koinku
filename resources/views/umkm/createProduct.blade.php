@extends('layouts.global')

@section('title')
    Create New Product
@endsection

<style>
    .btn-border{
        border: 1px solid rgb(124, 132, 241);
        padding: 5px;
        font-size: 15px;
        color: rgb(124, 132, 241);
        margin-right: 2px;
    }
</style>
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">Create Product</h5>
            <form action="{{ route('manage-product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="nama_product" placeholder="Nama Product" aria-label="Nama Product" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" aria-label="Deskripsi" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="qty" placeholder="Quantity" aria-label="Quantity" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="images[]" id="imagess" placeholder="Upload Images Link Embeded Google Drive" aria-label="images" aria-describedby="basic-addon1">
                </div>
                <div id="addMedia"></div>
                <div class="input-group mb-3">
                    <button type="button" onclick="addMedia('vidio')" class="btn-border"><i class="simple-icon-film"> Tambahkan Vidio</i></button>
                    <button type="button" onclick="addMedia('foto')" class="btn-border"><i class="simple-icon-picture"> Tambahkan Foto</i></button>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="number" class="form-control" name="price" aria-label="Amount (to the nearest rupiah)">
                </div>
                
                <button class="btn btn-info" type="submit">Publish</button>
            </form>
        </div>
    </div>
@endsection

<script src="{{ asset('js/jquery.min.js')}}"></script>
<script>
    $(document).on("change", "#imagess", function () {
        var img = $("#imagess").val()
        if (img) {
            $(".media").removeAttr('disabled');
        }else{
            $(".media").attr('disabled','disabled');
        }
    })
    
    function addMedia(state) {
        var media = `<div class="input-group mb-3">
                        <input type="text" class="media form-control" name="`+state+`[]" id="`+state+`" placeholder="Upload `+state+` Link Embeded Google Drive" aria-label="`+state+`" aria-describedby="basic-addon1" disabled>
                    </div>`
        $("#addMedia").append(media)
    }
</script>