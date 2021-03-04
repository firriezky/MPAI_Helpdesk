@extends('layouts.landing')
@section('main-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                    <div class="col-lg-6 my-auto mx-auto">
                            <lottie-player src="https://assets6.lottiefiles.com/private_files/lf30_7z3j6ycb.json" 
                            background="transparent" speed="1" class="my-auto mx-auto img-fluid"  loop autoplay></lottie-player>
                        </div>

                        <div class="col-lg-6">
                            <div class="p-5 justify-content-center">
                                <div class="text-center col-12 w-100 ">
                                    <h1 class="text-gray-900 mb-4"> <strong>SIBIMA IT HELPDESK</strong></h1>
                                </div>

                                <div class="col-12"><h4>IT Helpdesk Ticketing</h4></div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <a href="{{url("/ticket/new-ticket")}}" class="btn btn-primary btn-block btn-icon-split mt-3 ">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-flag"></i>
                                            </span>
                                            <span class="text">Request Ticket</span>
                                        </a>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <a href="{{url("/ticket/find")}}" class="btn btn-success btn-block btn-icon-split mt-3 ">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-flag"></i>
                                            </span>
                                            <span class="text">Cek Status Ticket</span>
                                        </a>
                                    </div>       

                                      <div class="col-12 col-lg-12">
                                        <a href="{{url("/ticket/new-ticket")}}" class="btn btn-warning btn-block btn-icon-split mt-3 ">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-flag"></i>
                                            </span>
                                            <span class="text">Kritik & Saran Badan Mentoring</span>
                                        </a>
                                    </div>                                  
                                </div>


                                <div class="col-12 mt-5"><h4>Cek Data</h4></div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <a href="#" class="btn btn-border border-primary btn-block btn-icon-split mt-3 ">
                                            <span class="text">Data Mentor</span>
                                        </a>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <a href="#" class="btn btn-border border-primary btn-block btn-icon-split mt-3 ">
                                            <span class="text">Mentee</span>
                                        </a>
                                    </div>

                                    <div class="col-12 col-lg-12">
                                        <a href="#" class="btn btn-border border-primary btn-block btn-icon-split mt-3 ">
                                            <span class="text">Kelompok</span>
                                        </a>
                                    </div>

                                    <div class="col-12 col-lg-12">
                                        <a href="#" class="btn btn-border border-primary btn-block btn-icon-split mt-3 ">
                                            <span class="text">Rekap Nilai</span>
                                        </a>
                                    </div>
                                  
                                </div>

                                <div class="col-12 mt-5"><h4>Login SIBIMA</h4></div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <a href="https://ft.badanmentoring.org" class="btn btn-border border-primary btn-block btn-icon-split mt-3 ">
                                            <span class="text">Teknik (FRI,FIF,FTE)</span>
                                        </a>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <a href="https://fit.badanmentoring.org" class="btn btn-border border-primary btn-block btn-icon-split mt-3 ">
                                            <span class="text">F. Ilmu Terapan</span>
                                        </a>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <a href="https://fik.badanmentoring.org" class="btn btn-border border-primary btn-block btn-icon-split mt-3 ">
                                            <span class="text">F. Industri Kreatif</span>
                                        </a>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <a href="https://fkeb.badanmentoring.org" class="btn btn-border border-primary btn-block btn-icon-split mt-3 ">
                                            <span class="text">F. Ekonomi dan Bisnis</span>
                                        </a>
                                    </div>

                                    <div class="col-12 col-lg-12">
                                        <a href="{{url('/login')}}" class="btn btn-border border-primary btn-block btn-icon-split mt-3 ">
                                            <span class="text">Admin IT Helpdesk</span>
                                        </a>
                                    </div>
                                  
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

                                <hr>

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection