@extends('layouts.ticket')

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1><strong>Cek Status Ticket</strong></h1>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger border-left-danger" role="alert">
                                            <ul class="pl-4 my-2">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="" action="#" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="ticketID" name="class"
                                                placeholder="Masukkan Nomor Ticket" value="{{ old('class') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <button id="findTicket" onclick="findTheTicket()" type="button" class="btn btn-primary btn-user btn-block">
                                                Cek Status Ticket
                                            </button>
                                        </div>

                                        <script>
                                           
                                           let findTheTicket = () =>{
                                               console.log("Testing");
                                               let inputVal = document.getElementById("ticketID").value.toString();
                                               let windowLocation = "{{url('/')}}/ticket/find/"+inputVal;
                                               window.location.replace(windowLocation);
                                            }

                                                // $('#findTicket').click(function(e) {
                                                //     var inputvalue = $("#ticketID").val();
                                                //     window.location.replace(
                                                //         " http://www.example.com/page/" + inputvalue);
                                        </script>

                                        <hr>
                                        <h4 class="text-center">Terima Kasih Sudah Menggunakan Layanan IT Helpdesk SIBIMA
                                        </h4>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
