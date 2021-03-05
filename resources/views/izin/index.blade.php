@extends('layouts.ticket')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-5  mx-auto">
                            <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_bR3P9F.json"  background="transparent"  speed="1"   class="my-auto mx-auto img-fluid"  loop  autoplay></lottie-player>
                            <h1 class="text-center">Input Perizinan</h1>
                        </div>

                        <div class="col-lg-12">
                            <div class="p-5">
                                @if ($errors->any())
                                <div class="alert alert-danger border-left-danger" role="alert">
                                    <ul class="pl-4 my-2">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form method="POST" action="{{ route('input-izin') }}" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" 
                                        name="name" placeholder="{{ __('Nama Mentor/Mentee') }}" value="{{ old('name') }}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" name="nim" placeholder="{{ __('NIM') }}" value="{{ old('nim') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="class" placeholder="{{ __('Asal Kelas') }}" value="{{ old('class') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Agenda : </label>
                                        <select required class="form-control" name="agenda_id" id="">
                                            @foreach ($agendas as $item)
                                            <option value="{{$item->id}}">{{$item->judul}}</option>
                                            @endforeach
                                        </select>
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
                                        <label for="">Jenis Akun : </label>
                                        <select required class="form-control" name="account_type" id="">
                                            <option value="">Pilih Jenis Akun</option>
                                            <option value="1">Asisten MPAI / Kakak Mentor</option>
                                            <option value="2">Mahasiswa / Mentee</option>
                                            <option value="3">Dosen</option>
                                            <option value="4">Pengurus Badan Mentoring</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jenis Perizinan : </label>
                                        <select required class="form-control" name="izin_type" id="">
                                            <option value="2">Sakit/Berobat</option>
                                            <option value="1">Kelas / Praktikum / Kuliah</option>
                                            <option value="3">Lomba</option>
                                            <option value="4">Urusan Keluarga</option>
                                            <option value="5">Lain-lain</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Detail Perizinan : </label>
                                        <textarea class="form-control" required name="detail" id="" rows="5" placeholder="Masukkan Detail Ticket/Keluhan Anda">{{ old('detail') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Bukti Pendukung (Foto Screenshot) Jika Dibutuhkan</label>
                                        <input type="file"  multiple class="form-control-file" name="file[]" id="" placeholder="" value="{{ old('file') }}" >
                                        <small id="helpId" class="form-text text-muted">Silakan upload file pendukung jika diperlukan</small>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Kirim Perizinan
                                        </button>
                                    </div>
                                </form>

                                <hr>

                                <div class="text-center">
                                    <a class="small" href="{{ url('ticket/find') }}">
                                        {{ __('Terima Kasih Sudah Menggunakan Layanan IT Helpdesk Mentoring') }}
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