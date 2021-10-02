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
                        <th>Nominal</th>
                        <th>Status</th>
                        <th>Transaksi Dengan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekpens as $key => $rekpen)  
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ $rekpen->judul }}</td>
                            <td>{{ $rekpen->nominal }}</td>
                            <td><span class="badge badge-primary">{{ $rekpen->status }}</span></td>
                            @if ($rekpen->buyer_id)  
                                <td>{{ $rekpen->buyer_id }}</td>
                            @else
                                <td>-</td>
                            @endif
                            <td>
                                <button id="getlink" data-resource="{{ $rekpen->token }}" class="btn btn-info"><i alt="Salin Link" class="simple-icon-link"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<script src="{{ asset('js/jquery.min.js')}}"></script>
<script>
    $(document).on('click', '#getlink', function (e) {
        var resource = e.currentTarget.dataset.resource;
        var Url = "http://koimp/rekpen?token="+resource
        // Url = window.location.href;
        console.log(Url)
        Url.select(); 
        document.execCommand("copy");
    })
    // function getlink() {
    //     var Url = document.getElementById("url");
    //     Url.innerHTML = window.location.href;
    //     console.log(Url.innerHTML)
    //     Url.select();
    //     document.execCommand("copy");
    // }
</script>