@extends('layouts.global')

@section('title')
    Chat
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row app-row" id="message_ids">
            <p class="text-muted">Chats Capps</p>
        </div>
    </div>

    <div class="app-menu">
        <ul class="nav nav-tabs card-header-tabs ml-0 mr-0 mb-1" role="tablist">
            <li class="nav-item w-100 text-center">
                <a class="nav-link active" id="first-tab" data-toggle="tab" role="tab" aria-selected="true">Messages</a>
            </li>
        </ul>

        <div class="p-4 h-100">
            @if ($messages)
                <div class="form-group">
                    <input type="text" class="form-control rounded" placeholder="Search">
                </div>
            @endif

            <div class="tab-content h-100" id="message-group">
                <div class="tab-pane fade show active  h-100" id="firstFull" role="tabpanel" aria-labelledby="first-tab">
                    <div class="scroll">   
                        @if (!$messages)
                            <div class="flex-row mb-1 pb-3 mb-3">
                                <p class="text-center text-muted">message empty</p> 
                            </div>
                        @endif
                        @foreach ($messages as $message)
                            @if ($message->buyer_id)
                                <a class="d-flex" id="show-message" data-message_id="{{$message->buyer_id}}">
                                    <div class="d-flex flex-row mb-1 border-bottom pb-3 mb-3">
                                        <img alt="Profile Picture" src="{{ asset('img/LOGO 1.png') }}"
                                            class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                                        <div class="d-flex flex-grow-1 min-width-zero">
                                            <div
                                                class="pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                                <div class="min-width-zero">
                                                    <p class=" mb-0 truncate">CAPPS</p>
                                                    <p class="mb-1 text-muted text-small">09:25</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>  
                            @endif
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    </main>
@endsection
@section('footer')
    <div id="button-send"></div>
@endsection
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        $(document).on('click', '#show-message', function(e) {
            let messageid = e.currentTarget.dataset.message_id;
            
            $.ajax({
                type: 'GET',
                url: '/umkm/chat/show',
                data: {
                    message_id : messageid,
                },
                async: false,
                dataType: 'json',
                success: function(response) {
                    var header = `
                            <div class="col-12 chat-app" id="data_id" data-send_id="`+messageid+`">
                                <div class="d-flex flex-row justify-content-between mb-3 chat-heading-container">
                                    <div class="d-flex flex-row chat-heading">
                                        <a class="d-flex" href="#">
                                            <img alt="Profile Picture" src="{{ asset('img/LOGO 4.png') }}"
                                                class="img-thumbnail border-0 ml-0 mr-4 list-thumbnail align-self-center small">
                                        </a>
                                        <div class=" d-flex min-width-zero">
                                            <div
                                                class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                                <div class="min-width-zero">
                                                    <a href="#">
                                                        <p class="list-item-heading mb-1 truncate">CAPPS</p>
                                                    </a>
                                                    <p class="mb-0 text-warning text-small">online</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="separator mb-5"></div>
                
                                <div class="scroll">
                                    <div class="scroll-content">
                                        <div id="view_message"></div>

                                        <div id="send_message"></div>
                                    </div>
                                </div>
                            </div>`
                    var btn_send = `<div class="chat-input-container d-flex justify-content-between align-items-center">
                                        <input class="form-control flex-grow-1" type="text" placeholder="Say something..." id="message">
                                        <div>
                                            <button type="button" class="btn btn-outline-primary icon-button large">
                                                <i class="simple-icon-paper-clip"></i>
                                            </button>
                                            <button type="submit" id="btn-message" class="btn btn-primary icon-button large">
                                                <i class="simple-icon-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>`

                    $('#button-send').html(btn_send) 
                    $('#message_ids').html(header)    
                                                
                    for (const key in response) {
                        if (Object.hasOwnProperty.call(response, key)) {
                            var message_seller = response[key].message_seller;
                            var message_buyer = response[key].message_buyer;
                            var view_message_seller = `<div class="clearfix"></div>
                                                <div class="card d-inline-block mb-3 float-right mr-2">
                                                    <div class="position-absolute pt-1 pr-2 r-0">
                                                        <span class="text-extra-small text-muted">20:11</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="d-flex flex-row pb-2">
                                                            <a class="d-flex" href="#">
                                                                @if (Auth::guard('user')->user()->profil)
                                                                    <img alt="Profile Picture" src="{{asset('storage/'. Auth::user()->profil)}}" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall"/>
                                                                @else 
                                                                    <img alt="Profile Picture" src="{{ asset('img/image-not-found.png')}}" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall"/>
                                                                @endif
                                                            </a>
                                                            <div class=" d-flex flex-grow-1 min-width-zero">
                                                                <div
                                                                    class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                                                    <div class="min-width-zero">
                                                                        <p class="mb-0 truncate list-item-heading">{{ Auth::guard('user')->user()->name }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                        
                                                        <div class="chat-text-left">
                                                            <p class="mb-0 text-semi-muted">
                                                                `+message_seller+`
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>`
                                           
                            var view_message_buyer = `<div class="clearfix"></div>
                                                <div class="card d-inline-block mb-3 float-left mr-2">
                                                    <div class="position-absolute pt-1 pr-2 r-0">
                                                        <span class="text-extra-small text-muted">20:11</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="d-flex flex-row pb-2">
                                                            <a class="d-flex" href="#">
                                                                <img alt="Profile Picture" src="{{ asset('img/LOGO 1.png')}}"
                                                                    class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                                                            </a>
                                                            <div class=" d-flex flex-grow-1 min-width-zero">
                                                                <div
                                                                    class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                                                    <div class="min-width-zero">
                                                                        <p class="mb-0 truncate list-item-heading">CAPPS</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                        
                                                        <div class="chat-text-left">
                                                            <p class="mb-0 text-semi-muted">
                                                                `+message_buyer+`
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>`
                            if (view_message_buyer) {
                                $('#view_message').append(view_message_buyer)
                            }else if(message_seller){
                                $('#view_message').append(view_message_seller)
                            }
                        }
                    }
                        
                    },
                    error: function(response) {
                        console.log(response)
                    }
                });
            })

        $(document).on('click', "#btn-message", function () {
            let message = $("#message").val();
            send_message(message)
        })

        $(document).on('keypress', "#message" ,function(e) {
            if(e.which == 13) {
                var message = $("#message").val();
                send_message(message)
            }
        });
        
        function send_message(message) {
            document.getElementById('message').value = ''
            var buyer_id = $('#data_id').attr('data-send_id');
            
            $.ajax({
                type: 'POST',
                url: '/umkm/chat/post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    message : message,
                    buyer_id : buyer_id,
                },
                async: false,
                dataType: 'json',
                success: function(response) {
                    // Untuk notifikasi response silahkan ubah sesuai kebutuhan
                    var send = `<div class="clearfix"></div>
                            <div class="card d-inline-block mb-3 float-right mr-2">
                                <div class="position-absolute pt-1 pr-2 r-0">
                                    <span class="text-extra-small text-muted">`+response.timestamp+`</span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-row pb-2">
                                        <a class="d-flex" href="#">
                                            @if (Auth::guard('user')->user()->profil)
                                                <img alt="Profile Picture" src="{{asset('storage/'. Auth::user()->profil)}}" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall"/>
                                            @else 
                                                <img alt="Profile Picture" src="{{ asset('img/image-not-found.png')}}" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall"/>
                                            @endif
                                        </a>
                                        <div class=" d-flex flex-grow-1 min-width-zero">
                                            <div
                                                class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                                <div class="min-width-zero">
                                                    <p class="mb-0 truncate list-item-heading">{{ Auth::guard('user')->user()->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="chat-text-left">
                                        <p class="mb-0 text-semi-muted">
                                            `+response.message+`
                                        </p>
                                    </div>
                                </div>
                            </div>`;
                    $('#send_message').append(send);
                },
            });
        }
    </script>
    
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/chartjs-plugin-datalabels.js') }}"></script>
    <script src="{{ asset('js/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('js/vendor/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('js/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/progressbar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ asset('js/vendor/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/vendor/Sortable.js') }}"></script>
    <script src="{{ asset('js/vendor/mousetrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/glide.min.js') }}"></script>
    <script src="{{ asset('js/vendor/order.js') }}"></script>
    <script src="{{ asset('js/dore.script.js') }}"></script>
    <script src="{{ asset('js/scripts.single.theme.js') }}"></script>
    <script src="https://css-tricks.foxycart.com/files/foxycart_includes.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>