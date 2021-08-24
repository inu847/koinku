@extends('layouts.global')

@section('title')
    Rekpen
@endsection

@section('content')
    <div class="card">
        <div class="card-header m-3">
            <div class="float-left">
                <h3>Rekpen</h3> 
             </div>
             <div class="float-right">
                 <a href="{{ route('rekpen.create') }}" class="btn btn-primary"><i class="simple-icon-plus"></i> Buat Transaksi</a>
             </div> 
        </div>
        <div class="card-body">
            <h6 class="text-muted"><i class="simple-icon-clock"></i> History</h6>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Transaksi</th>
                        <th>Dibuat Pada</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Koi</td>
                        <td>190</td>
                        <td>On Proces</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection