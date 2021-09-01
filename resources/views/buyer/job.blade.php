@extends('layouts.buyer')

@section('title')
    Lowongan Pekerjaan
@endsection

@section('content')
    @foreach ($jobs as $job)
        <div class="card mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <div class="pl-5 pr-2 mb-4">
                            <div class="row mb-4">
                                <p class="col-sm-2"><strong>Nama Pekerjaan</strong></p>
                                <span class="col-sm-2">{{$job->job_title}}</span>                                
                            </div>
                            
                            <div class="row">
                                <p class="text-muted col-sm-2">Perusahaan </p>
                                <span class="col-sm-3">{{$job->perusahaan}}</span>

                                <p class="text-muted col-sm-2">Tipe Pekerjaan </p>
                                <span class="col-sm-3">{{$job->type_work}}</span>
                            </div>
                            <div class="row">
                                <p class="text-muted col-sm-2">Deskripsi Pekerjaan </p>
                                <span class="col-sm-3">{{$job->deskripsi}}</span>

                                <p class="text-muted col-sm-2">Skill yang dibutuhkan </p>
                                <span class="col-sm-3">{{$job->skill}}</span>
                            </div>
                            <div class="row">
                                <p class="text-muted col-sm-2">Email </p>
                                <span class="col-sm-3">{{$job->email}}</span>
                            </div>
                            <div class="separator mb-4 mt-2"></div>
                            {{-- Alamat --}}
                            <div class="row">
                                <p class="col-sm-2"><strong>Alamat</strong> </p>
                            </div>
                            {{-- <input type="hidden" value="{{$alamat = alamatJob($job->alamat_id)}}"> --}}
                            <div class="row">
                                <p class="text-muted col-sm-2">Provinsi </p>
                                <span class="col-sm-3">Jawa Timur</span>

                                <p class="text-muted col-sm-2">RT </p>
                                <span class="col-sm-3">02</span>
                            </div>
                            <div class="row">
                                <p class="text-muted col-sm-2">Kabupaten </p>
                                <span class="col-sm-3">Blitar</span>

                                <p class="text-muted col-sm-2">RW </p>
                                <span class="col-sm-3">01</span>
                            </div>
                            <div class="row">
                                <p class="text-muted col-sm-2">Desa </p>
                                <span class="col-sm-3">Selopuro</span>

                                <p class="text-muted col-sm-2">Kode Pos </p>
                                <span class="col-sm-3">66184</span>
                            </div>
                            <div class="row">
                                <p class="text-muted col-sm-2">Alamat </p>
                                <span class="col-sm-3">Selopuuro jl.Ahmadyani no.46</span>

                                <p class="text-muted col-sm-2">Kecamatan </p>
                                <span class="col-sm-3">Selopuro</span>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="btn btn-success btn-block">Lamar Pekerjaan</a>

                </div>
            </div>
        </div>
    @endforeach
@endsection