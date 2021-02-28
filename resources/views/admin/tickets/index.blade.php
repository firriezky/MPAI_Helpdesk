@extends('layouts.admin')

@section('js-addons')
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4-4.1.1/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/r-2.2.7/sb-1.0.1/sp-1.2.2/datatables.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js">
    </script>

    <script>
        $(document).on('click', '.edit_data', function() {
            document.getElementById("mStatus").innerHTML = "";
            document.getElementById("supportPhotoContainer").innerHTML = "";
            var ticketID = $(this).attr("id");
            var csrf = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ url('/ticket/fetch/') }}",
                method: "POST",
                data: {
                    id: ticketID,
                    '_token': csrf
                },
                error: function(ts) {
                    alert(ts.responseText)
                }, // or console.log(ts.responseText)
                success: function(data) {
                    console.log(data);
                    let mType = data.ticket_type;
                    let ticketType = "Unknown Ticket Type";

                    switch (mType) {
                        case "1":
                            ticketType = "Reset Password"
                            break;
                        case "2":
                            ticketType = "Laporan Bug/Error"
                            break;
                        case "3":
                            ticketType = "Perbaikan Data/Kesalahan Data"
                            break;
                        case "4":
                            ticketType = "Administrasi"
                            break;
                        case "5":
                            ticketType = "Lain-lain"
                            break;

                        default:
                            ticketType = "Unknown Type"
                            break;
                    }

                    var fileArray = data.file.split(',');
                    var nim = data.nid;

                    let mStatus = data.status;
                    let statusAppend = "";

                    switch (mStatus) {
                        case "0":
                            statusAppend =
                                "<span class='badge badge-info'>Status : Dalam Antrian</span>"
                            break;

                        case "1":
                            statusAppend =
                                '<span class="badge badge-success">Status : Selesai/Solved</span>'
                            break;

                        case "3":
                            statusAppend = '<span class="badge badge-warning">Status : Diproses</span>'
                            break;

                        case "2":
                            statusAppend =
                                '<span class="badge badge-danger">Status : Gagal Diproses</span>'
                            break;

                        default:
                            break;
                    }

                    document.getElementById("mName").textContent = data.name;
                    document.getElementById("mClass").textContent = data.class;
                    document.getElementById("modelHeading").textContent = "Ticket : " + data.ticket_id;
                    document.getElementById("mNIM").textContent = nim;
                    document.getElementById("mFaculty").textContent = data.faculty;
                    document.getElementById("mTicketType").textContent = ticketType;
                    document.getElementById("mTicketDetail").textContent = data.ticket_detail;
                    $('#mStatus').append(statusAppend);

                    let fileRoot = "{{ url('/') }}" + "/ticketPhoto/" + nim + "/";
                    for (const file of fileArray) {
                        $('#supportPhotoContainer').append(
                            "<img src='" + fileRoot + file + "' class='img-fluid prev_img'></a>"
                        );
                    }

                    console.log(data.id);
                    console.log(data.name);
                    console.log(data.class);
                    console.log(data.faculty);
                }
            });
        });

    </script>


    <script>
        $('.btn-reset').on('click', function() {
            var mentor_id = $(this).attr('mentor');
            var mentor_name = $(this).attr('data-name');
            $('input[id="mentor_id"]').val(mentor_id);
            $('#mentor_name').val(mentor_name);
        });

        $('#dataTable').DataTable({
            dom: 'lrtipB',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
            ]
        });

        var paginate = {{ request()->route('paginate') }}
        $('#selectPaginate').val(paginate);

    </script>
@endsection

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ticket Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ticketCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('Users') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
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

        <div class="col-lg-12 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ticket Masuk</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive dataTables_wrapper dt-bootstrap4">
                        <table id="dataTable" class="table  ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Fakultas</th>
                                    <th>Kelas</th>
                                    <th>Akun</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ticket->nid }}</td>
                                        <td>{{ $ticket->name }}</td>
                                        <td>{{ $ticket->faculty }}</td>
                                        <td>{{ $ticket->class }}</td>
                                        <td>
                                            @if ($ticket->account_type == 1)
                                                Mentor
                                            @endif
                                            @if ($ticket->account_type == 2)
                                                Mahasiswa / Mentee
                                            @endif
                                            @if ($ticket->account_type == 3)
                                                Dosen
                                            @endif

                                        </td>
                                        <td>
                                            @if ($ticket->status == 0)
                                                <span class="badge badge-info">Status : Dalam Antrian</span>
                                            @endif

                                            @if ($ticket->status == 1)
                                                <span class="badge badge-success">Status : Selesai/Solved</span>
                                            @endif

                                            @if ($ticket->status == 2)
                                                <span class="badge badge-warning">Status : Gagal</span>
                                            @endif

                                            @if ($ticket->status == 3)
                                                <span class="badge badge-warning">Status : Diproses</span>
                                            @endif
                                        </td>

                                        <td>{{ $ticket->ticket_type }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" id="{{ $ticket->id }}"
                                                class="btn btn-primary btn-xs edit_data" data-toggle="modal"
                                                data-target="#ajaxModel">
                                                Lihat Detail
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




            <div class="modal fade bd-example-modal-lg" id="ajaxModel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modelHeading"></h4>
                        </div>
                        <div class="modal-body">
                            <form id="CustomerForm" name="CustomerForm" class="form-horizontal">
                                <input type="hidden" name="Customer_id" id="Customer_id">
                                <ul>
                                    <li>Nama : <span id="mName"></span></li>
                                    <li>Nomor ID : <span id="mNIM"></span></li>
                                    <li>Fakultas : <span id="mFaculty"></span></li>
                                    <li>Kelas : <span id="mClass"></span></li>
                                    <li>Tipe Ticket : <span id="mTicketType"></span></li>
                                </ul>

                                <h5>Status Ticket : <strong><span id="mStatus"></span></strong></h5>
                                <form action="">

                                    <div class="form-group">
                                        <label for="">Ubah Status Tiket</label>
                                        <select required class="form-control" name="status" id="">
                                            <option value="">Ubah Status</option>
                                            <option value="0">Dalam Antrian</option>
                                            <option value="1">Selesai</option>
                                            <option value="2">Gagal</option>
                                            <option value="3">Diproses</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-outline-primary mb-2">Simpan Perubahan</button>
                                </form>

                                <div id="ticketDetailCollapse" role="tablist" aria-multiselectable="true">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="section1HeaderId">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#ticketDetailCollapse"
                                                    href="#ticketCollapsed" aria-expanded="true"
                                                    aria-controls="section1ContentId">
                                                    Detail Tiket ( Klik Untuk Melihat)
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="ticketCollapsed" class="collapse in" role="tabpanel"
                                            aria-labelledby="section1HeaderId">
                                            <div class="card-body">
                                                <h5><strong>Detal Tiket :</strong></h5>
                                                <span id="mTicketDetail"></span></li>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="photoProofCollapse" role="tablist" aria-multiselectable="true">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="section1HeaderId">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#photoProofCollapse"
                                                    href="#section1ContentId" aria-expanded="true"
                                                    aria-controls="section1ContentId">
                                                    Bukti Pendukung
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="section1ContentId" class="collapse in" role="tabpanel"
                                            aria-labelledby="section1HeaderId">
                                            <div class="card-body">
                                                <div class="container row" id="supportPhotoContainer"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor
                        page performance. Custom CSS classes are used to create custom components and custom utility
                        classes.</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework,
                        especially the utility classes.</p>
                </div>
            </div>

        </div>

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
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


    </div>
@endsection
