@extends('layouts.global')

@section('title')
    Buat Transaksi
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="m-3">Buat Transaksi</h3>
            <hr class="m-2">
            <form action="{{ route('rekpen.bayar')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-2">
                    <label for="">Judul Transaksi</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Buyer</label>
                    <div>
                        <small>*kosongkan jika pembeli tidak terdaftar sebagai user</small>
                    </div>
                    <input type="email" name="email" class="form-control" id="buyer" placeholder="Masukkan Email Buyer">
                    <div id="card-email"></div>
                </div>
                <div class="form-group">
                    <label for="">Nominal</label>
                    <input type="number" name="nominal" class="form-control" id="nominal" placeholder="">
                </div>
                <button class="btn btn-primary btn-block" id="bayar">Bayar</button>
            </form>
        </div>
    </div>
@endsection

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $(document).on('input', "#buyer", function () {
        var elemEmail = `<div class="card col-md-11" style="position: absolute;" id="view-mail">
                                <div class="card-body" id="email">
                                        
                                </div>
                            </div>`
        $('#card-email').html(elemEmail)
        var data = $('#buyer').val()

        $.ajax({
            type: 'POST',
            url: '{{route("rekpen.findByEmail")}}',
            data: {
                "_token": "{{ csrf_token() }}",
                email : data,
            },
            async: false,
            dataType: 'json',
            success: function(response) {
                var results = response.data
                console.log(results[0].email)
                
                for (let i = 0; i < results.length; i++) {
                    $('#email').append('<p id="setEmail" data-choice="'+results[i].email+'">'+results[i].email+'</p>')
                }
                
            },
            error: function(response) {
                console.log(response)
            }
        });
    })

    $(document).on('click', '#setEmail', function (e) {
        var choiceEmail = e.currentTarget.dataset.choice;
        console.log(choiceEmail)
        $("#view-mail").remove()
        $("#buyer").val(choiceEmail)
    })
</script>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-zuLignrNUoqy1d-0"></script>
<script>
    $(document).on('click', '#bayar', function(e) {
        var judul = $("#judul").val();
        var nominal = $("#nominal").val()
        $.ajax({
            type: 'POST',
            url: '/umkm/rekpen/pembayaran',
            data: {
                "_token": "{{ csrf_token() }}",
                judul : judul,
                nominal : nominal,
            },
            async: false,
            dataType: 'json',
            success: function(response) {
                var token = response.token;                
                    snap.pay(token, {
                        onSuccess: function (result) {
                            alert("payment Success");
                            console.log(result);
                        },
                        onPending: function (result) {
                            // Muncul Setelah Pembayaran
                            // alert("payment Pending");
                            // console.log(result);
                            var status_message = result.status_message
                            var transaction_id = result.transaction_id
                            var gross_amount = result.gross_amount
                            var payment_type = result.payment_type
                            var transaction_status = result.transaction_status
                            var bank = result.va_numbers[0].bank
                            var va_number = result.va_numbers[0].va_number
                            var fraud_status = result.fraud_status
                            var pdf_url = result.pdf_url
                            var order_id = result.order_id

                            $.ajax({
                                type: 'POST',
                                url: '/customers/transaksi/create',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    status_message : status_message,
                                    transaction_id : transaction_id,
                                    gross_amount : gross_amount,
                                    payment_type : payment_type,
                                    transaction_status : transaction_status,
                                    bank : bank,
                                    va_number : va_number,
                                    fraud_status : fraud_status,
                                    pdf_url : pdf_url,
                                    order_id : order_id
                                },
                                async: false,
                                dataType: 'json',
                                success: function(response) {
                                    var redirect = response.redirect
                                    window.location.href = redirect;
                                },
                                error: function(response) {
                                    console.log(response)
                                }
                            });
                        },
                        onError: function (result) {
                            alert("payment failed");
                            console.log(result);
                        },
                        onClose: function () {
                            console.log("payment cancel");
                        },
                    }); 
            },
            error: function(response) {
                console.log(response)
            }
        });
    })
</script>