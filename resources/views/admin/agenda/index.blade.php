@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Buat Agenda') }}</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Agenda</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['agendas'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('Agenda Berlangsung') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['agendas'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Buat Agenda Baru</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('create-ticket') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" placeholder="{{ __('Name') }}"
                             value="{{ old('name') }}" required autofocus>
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
                </div>
            </div>

            <!-- Color System -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                        <div class="card-body">
                            Primary
                            <div class="text-white-50 small">#4e73df</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            Success
                            <div class="text-white-50 small">#1cc88a</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-info text-white shadow">
                        <div class="card-body">
                            Info
                            <div class="text-white-50 small">#36b9cc</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            Warning
                            <div class="text-white-50 small">#f6c23e</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            Danger
                            <div class="text-white-50 small">#e74a3b</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-secondary text-white shadow">
                        <div class="card-body">
                            Secondary
                            <div class="text-white-50 small">#858796</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('img/svg/undraw_editable_dywm.svg') }}" alt="">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw →</a>
                </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                </div>
            </div>

        </div>
    </div>
@endsection
