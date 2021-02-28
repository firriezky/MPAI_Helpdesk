@extends('layouts.ticket')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-5  mx-auto">
                            <lottie-player src="https://assets6.lottiefiles.com/private_files/lf30_7z3j6ycb.json" background="transparent" speed="1" class="my-auto mx-auto img-fluid" loop autoplay></lottie-player>
                            <h1 class="text-center">SIBIMA IT HELPDESK</h1>
                        </div>

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Request Ticket</h1>
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

                                <form method="POST" action="{{ route('create-ticket') }}" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" name="nim" placeholder="{{ __('NIM') }}" value="{{ old('nim') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="class" placeholder="{{ __('Asal Kelas') }}" value="{{ old('class') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Fakultas Asal : </label>
                                        <select required class="form-control" name="faculty" id="">
                                            <option value="FRI">FAKULTAS REKAYASA INDUSTRI</option>
                                            <option value="FIT">FAKULTAS ILMU TERAPAN</option>
                                            <option value="FTE">FAKULTAS TEKNIK ELEKTRO</option>
                                            <option value="FKEB">FAKULTAS EKONOMI DAN BISNIS</option>
                                            <option value="FIF">FAKULTAS INFORMATIKA</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Saya Adalah : </label>
                                        <select required class="form-control" name="account_type" id="">
                                            <option value="">Pilih Jenis Akun</option>
                                            <option value="1">Asisten MPAI / Kakak Mentor</option>
                                            <option value="2">Mahasiswa / Mentee</option>
                                            <option value="3">Dosen</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jenis Tiket/Laporan : </label>
                                        <select required class="form-control" name="ticket_type" id="">
                                            <option value="2">Laporan Bug/Error</option>
                                            <option value="1">Reset Password</option>
                                            <option value="3">Perbaikan Data/Kesalahan Data</option>
                                            <option value="4">Administrasi</option>
                                            <option value="5">Lain-lain</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Keluhan/Ticket : </label>
                                        <textarea class="form-control" name="detail" id="" rows="5" placeholder="Masukkan Detail Ticket/Keluhan Anda">{{ old('detail') }}</textarea>

                                        <small id="helpId" class="form-text text-muted"> Request Ticket dapat dilakukan untuk masalah seperti : <br>
                                            <ul>
                                                <li>Lupa Password</li>
                                                <li>Tidak Bisa Login</li>
                                                <li>Tidak Bisa Input Tugas atau Nilai</li>
                                                <li>Bug atau Celah Keamanan</li>
                                                <li>Mentor Hilang / Tidak Pernah Muncul di Grup</li>
                                                <li>Mentee Hilang / Belum Pernah Ikut Mentoring</li>
                                                <li>Dan Permasalahan Teknis dan Administrasi Lainnya</li>
                                            </ul>
                                        </small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Bukti Pendukung (Foto Screenshot) Jika Dibutuhkan</label>
                                        <input type="file"  multiple class="form-control-file" name="file[]" id="" placeholder="" value="{{ old('file') }}" >
                                        <small id="helpId" class="form-text text-muted">Silakan upload file pendukung jika diperlukan</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Kemana kami membalas / menjawab ticket anda ? </label>
                                        <input type="feedback" class="form-control form-control-user" name="feedback" placeholder="Preferensi Kanal Jawaban" value="{{ old('feedback') }}" required>
                                        <small id="helpId" class="form-text text-muted">Jawaban IT Helpdesk akan dikirimkan ke kanal preferensi anda <br>
                                            Contoh Penginputan :
                                            <ul>
                                                <li>Whatsapp (0882-2383-XXXX) atau</li>
                                                <li>Telegram (0882-2383-XXXX) atau</li>
                                                <li>Email (razkyfeb@gmail.com) atau</li>
                                                <li>Line (id_line_anda)</li>
                                            </ul>
                                        </small>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Kirim Ticket
                                        </button>
                                    </div>
                                </form>

                                <hr>

                                <div class="text-center">
                                    <a class="small" href="{{ url('ticket/find') }}">
                                        {{ __('Sudah Input Tiket ? Cek Status Tiket Disini') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection