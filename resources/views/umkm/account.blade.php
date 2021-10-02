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
                                                        <input type="text" class="form-control" name="username" value="{{$user->name}}">
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
                                                        <button type="button" id="alamat" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                                            aria-expanded="false" aria-controls="collapseOne">
                                                            -> Alamat Utama
                                                        </button>
                                
                                                        <div id="collapseOne" class="collapse " data-parent="#accordion">
                                                            <div class="p-4">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Provinsi</label>
                                                                        @if ($user->alamat)
                                                                            <select name="provinsi" id="province" class="form-control">
                                                                                <option value="{{ $user->alamat->provinsi }}">{{ province($user->alamat->provinsi) }}</option>
                                                                            </select>
                                                                        @else
                                                                            <select name="provinsi" id="province" class="form-control">
                                                                                <option></option>
                                                                            </select>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Kabupaten/Kota</label>
                                                                        @if ($user->alamat)
                                                                            <select name="kabupaten" id="kota" class="form-control">
                                                                                <option value="{{ $user->alamat->kabupaten }}">{{ kota($user->alamat->kabupaten) }}</option>
                                                                            </select>
                                                                        @else
                                                                            <select name="kabupaten" id="kota" class="form-control">
                                                                                <option></option>
                                                                            </select>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Kelurahan</label>
                                                                        @if ($user->alamat)
                                                                            <select name="kecamatan" id="kelurahan" class="form-control">
                                                                                <option value="{{ $user->alamat->kecamatan }}">{{ kelurahan($user->alamat->kecamatan) }}</option>
                                                                            </select>
                                                                        @else
                                                                            <select name="kecamatan" id="kelurahan" class="form-control">
                                                                                <option></option>
                                                                            </select>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Desa</label>
                                                                        @if ($user->alamat)
                                                                            <select name="desa" id="desa" class="form-control">
                                                                                <option value="{{ $user->alamat->desa }}">{{ desa($user->alamat->desa) }}</option>
                                                                            </select>
                                                                        @else
                                                                            <select name="desa" id="desa" class="form-control">
                                                                                <option></option>
                                                                            </select>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label for="">Jalan dan lain-lain</label>
                                                                        @if ($user->alamat->lain)
                                                                            <input type="text" class="form-control" name="lain" placeholder="Jalan, RT/RW" value="{{ $user->alamat->lain }}">
                                                                        @else
                                                                            <input type="text" class="form-control" name="lain" placeholder="Jalan, RT/RW">
                                                                        @endif
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
                                    <div class="d-flex justify-content-end align-items-center">
                                        <a href="{{ route('todoRegistrasiUmkm') }}" class="btn btn-info mr-2">Upgrade Account</a>
                                        <button class="btn btn-primary">Save</button>
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
    $(document).on('click', '#alamat', function () {
        if (!"{{ $user->alamat }}") {
            province()
        }
    })

    function province() { 
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