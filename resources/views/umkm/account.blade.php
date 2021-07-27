@extends('layouts.global')

@section('title')
    Setting Account
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12">

                <div class="row equal-height-container">
                    <div class="col-md-12 col-lg-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="card-header">
                                            <h3>Account Setting</h3>
                                        </div>
                                        <form action="{{ route('umkm.updateAccount')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="PUT" name="_method">
                                            <div class="card-body">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">Username</label>
                                                        <input type="text" class="form-control" name="username" value="{{$user->username}}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Nama Umkm</label>
                                                        <input type="text" class="form-control" name="nama_umkm" value="{{$user->nama_umkm}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email :</label>
                                                    <input type="text" class="form-control" name="email" value="{{$user->email}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">No Handphone</label>
                                                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}" disabled>
                                                </div>                                               
                                                
                                                <div class="form-group">
                                                    <label for="">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" name="tanggal_lahir" value="{{$user->tanggal_lahir}}">
                                                </div>

                                                <div id="accordion" class="form-group">
                                                    <div class="border">
                                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                                            aria-expanded="false" aria-controls="collapseOne">
                                                            -> Alamat Utama
                                                        </button>
                                
                                                        <div id="collapseOne" class="collapse " data-parent="#accordion">
                                                            <div class="p-4">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Provinsi</label>
                                                                        <select name="alamat[]" id="province" class="form-control" onclick="getprovinsi()">
                                                                            <option value="{{ json_decode($user->alamat[0]) }}">{{ province(json_decode($user->alamat)) }}</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Kota</label>
                                                                        <select name="alamat[]" id="kota" class="form-control">
                                                                            <option value="{{ json_decode($user->alamat[1]) }}">{{ kota(json_decode($user->alamat)) }}</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Kecamatan</label>
                                                                        <select name="alamat[]" id="kelurahan" class="form-control">
                                                                            <option value="{{ json_decode($user->alamat[2]) }}">{{ kelurahan(json_decode($user->alamat)) }}</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Desa</label>
                                                                        <select name="alamat[]" id="desa" class="form-control">
                                                                            <option value="{{ json_decode($user->alamat[3]) }}">{{ desa(json_decode($user->alamat)) }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="d-flex flex-row m-5 p-5">
                                                    @if ($user->profil)
                                                        <img src="{{asset('storage/'. $user->profil)}}" alt="Foto Profile" class="rounded-circle" style="width: 100px; height: 100px;"/>
                                                    @else
                                                        <img src="{{ asset('img/image-not-found.png')}}" alt="Foto Profile" class="rounded-circle" style="width: 100px; height: 100px;"/>
                                                    @endif
                                                </div>
                                                <div class="ml-5 mr-5">
                                                    <input type="file" name="profil">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 ml-auto">
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(function() {
        $("#province").change(function() { 
            var displaycourse = $("#province option:selected").val();
            $("#results").val(displaycourse);
            getkabupaten(displaycourse)
        })

        $("#kota").change(function() { 
            var displaycourse = $("#kota option:selected").val();
            $("#results").val(displaycourse);
            getKelurahan(displaycourse)
        })

        $("#kelurahan").change(function() { 
            var displaycourse = $("#kelurahan option:selected").val();
            $("#results").val(displaycourse);
            getDesa(displaycourse)
        })
    })

    function getprovinsi(){
        $.ajax({
            type: 'GET',
            url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
            async: false,
            dataType: 'json',
            success: function(response) {
                var data = response.provinsi
                var prov;
                console.log(data)
                for(i = 0;i < data.length;i++){
                    prov += "<option value='" + data[i].id + "'>" + data[i].nama + "</option>"
                }
                $("#province").html(prov);
            },
            error: function(response) {
                console.log(response)
            }
        });
    }

    function getkabupaten(idprov) {
     $.ajax({
            type: 'GET',
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='+idprov,
            async: false,
            dataType: 'json',
            success: function(response) {
                console.log(response)
                var getp,data;
                getp = response.kota_kabupaten;
                for(i = 0;i < getp.length;i++){
                    data += "<option value='" + getp[i].id + "'>" + getp[i].nama + "</option>"
                }
                $("#kota").html(data);
            },
            error: function(response) {
                console.log(response)
            }
        });
    }

    function getKelurahan(idkota) {
     $.ajax({
            type: 'GET',
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota='+idkota,
            async: false,
            dataType: 'json',
            success: function(response) {
                console.log(response)
                var getp,data;
                getp = response.kecamatan;
                for(i = 0;i < getp.length;i++){
                    data += "<option value='" + getp[i].id + "'>" + getp[i].nama + "</option>"
                }
                $("#kelurahan").html(data);
            },
            error: function(response) {
                console.log(response)
            }
        });
    }
    
    function getDesa(idkecamatan) {
     $.ajax({
            type: 'GET',
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan='+idkecamatan,
            async: false,
            dataType: 'json',
            success: function(response) {
                console.log(response)
                var getp,data;
                getp = response.kelurahan;
                for(i = 0;i < getp.length;i++){
                    data += "<option value='" + getp[i].id + "'>" + getp[i].nama + "</option>"
                }
                $("#desa").html(data);
            },
            error: function(response) {
                console.log(response)
            }
        });
    }

</script>