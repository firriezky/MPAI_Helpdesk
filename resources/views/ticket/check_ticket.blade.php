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
                                        <h2 class=""> <span class="badge badge-primary">No Ticket :
                                                {{ $ticketNum }}</span></h2>

                                        @if ($ticket->status == 0)
                                            <h2 class=""> <span class="badge badge-danger">Status : Dalam Antrian</span>
                                            </h2>
                                        @endif

                                        @if ($ticket->status == 1)
                                            <h2 class=""> <span class="badge badge-success">Status : Selesai/Solved</span>
                                            </h2>
                                        @endif

                                        @if ($ticket->status == 3)
                                            <h2 class=""> <span class="badge badge-warning">Status : Diproses</span></h2>
                                        @endif
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

                                    <form method="POST" action="{{ route('login') }}" class="user">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="card border-bottom-primary">
                                            <img class="card-img-top" src="holder.js/100x180/" alt="">
                                            <div class="card-body">
                                                <h4 class="card-title">Ticket Requested By : </h4>
                                                <ul>
                                                    <li>Nama : {{ $ticket->name }}</li>
                                                    <li>Nama : {{ $ticket->nid }}</li>
                                                    <li>Entitas : {{ $ticket->faculty . '-' . $ticket->class }}</li>
                                                    <li>Jenis Akun : {{ $accountDesc }}</li>

                                                    <strong>
                                                        @if ($ticket->ticket_type == 1)
                                                            <li>Jenis Tiket : Reset Password</li>
                                                        @endif
                                                        @if ($ticket->ticket_type == 2)
                                                            <li>Jenis Tiket : Laporan Bug/Error</li>
                                                        @endif
                                                        @if ($ticket->ticket_type == 3)
                                                            <li>Jenis Tiket : Kesalahan / Request Perbaikan Data</li>
                                                        @endif
                                                        @if ($ticket->ticket_type == 4)
                                                            <li>Jenis Tiket : Administrasi</li>
                                                        @endif
                                                        @if ($ticket->ticket_type == 5)
                                                            <li>Jenis Tiket : Lain-lain</li>
                                                        @endif
                                                    </strong>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="card border-bottom-primary mt-3">
                                            <img class="card-img-top" src="holder.js/100x180/" alt="">
                                            <div class="card-body">
                                                <h4 class="card-title">Isi Ticket : </h4>
                                                <textarea class="form-control" disabled name="detail" id=""
                                                    rows="5">{{ $ticket->ticket_detail }}</textarea>

                                            </div>
                                        </div>

                                        <div class="card border-bottom-success mt-4">
                                            <img class="card-img-top" src="holder.js/100x180/" alt="">
                                            <div class="card-body">
                                                <h4 class="card-title">Jawaban / Solusi Ticket : </h4>
                                                <textarea class="form-control" disabled name="detail" id=""
                                                    rows="5">{{ $ticket->answers_ticket }}</textarea>
                                            </div>
                                        </div>

                                        <hr>
                                        <h4 class="text-center">Terima Kasih Sudah Menggunakan Layanan IT Helpdesk SIBIMA</h4>
                                        <h4 class="text-center">Jawaban Tiket juga akan dikirimkan ke preferensi kanal jawaban anda</h4>
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
