@extends('layouts.global')

@section('title')
    Buat Transaksi
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="m-3">Buat Transaksi</h3>
            <hr class="m-2">
            <form action="">
                <div class="form-group mt-2">
                    <label for="">Judul Transaksi</label>
                    <input type="text" class="form-control" id="judul" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Nominal</label>
                    <input type="number" class="form-control" id="nominal" placeholder="">
                </div>
                <button class="btn btn-primary btn-block" id="bayar">Bayar</button>
            </form>
        </div>
    </div>
@endsection

<script src="{{ asset('js/jquery.min.js') }}"></script>
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