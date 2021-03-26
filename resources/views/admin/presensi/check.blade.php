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
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pilih Agenda Presensi
                            </div>
                            <div class="form-group">
                                <select class="form-control" onchange="populateTable();" name="" id="listAgenda">
                                    @foreach ($widget['agendas'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List Presensi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive dataTables_wrapper dt-bootstrap4">
                        <div class="table-responsive">
                            <table id="tablePresensi" class="table w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Fakultas</th>
                                        <th>Kelas</th>
                                        <th>Akun</th>
                                        <th>Feedback</th>
                                        <th>Jam Hadir</th>
                                        <th>Bukti Hadir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Buat Agenda Baru</h6>
                </div>
                <div class="card-body">

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
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="{{ asset('img/svg/undraw_editable_dywm.svg') }}" alt="">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow"
                            href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images
                        that you can use completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw →</a>
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
    </div>


@endsection


@section('js-addons')
    <script>
        populateTable = () => {
            counter=0;
            let csrf = $('meta[name="csrf-token"]').attr('content');
            let agendaSelect = document.getElementById("listAgenda");
            let agendaID = agendaSelect.options[agendaSelect.selectedIndex].value;
            $('#tablePresensi').DataTable({
                serverSide: false,
                "bDestroy": true,
                dom: 'lrtipB',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                ],

                "ajax": {
                    url: "{{ url('presensi/getAjax') }}",
                    type: "GET",
                    dataSrc: "presensi",
                    data: {
                        id: agendaID,
                        _token: csrf
                    },
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                },

                "columns": [
                    {
                        render: function(datum, type, row) {
                            counter++;
                            return counter;
                        }
                    },
                    {
                        data: 'nim'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'fakultas'
                    },
                    {
                        data: 'class'
                    },
                    {
                        render: function(datum, type, row) {
                            switch (row.account_type) {
                                case "1":
                                    return "Mentor"
                                    break;
                                case "2":
                                    return "Mentee"
                                    break;
                                case "3":
                                    return "Dosen"
                                    break;
                                case "4":
                                    return "Pengurus"
                                    break;
                                default:
                                    return "Unknown Account Type"
                                    break;
                            }

                        }
                    },
                    {
                        data: 'feedback'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        render: function(datum, type, row) {
                            let html = "<a href='" + row.photo + "'>Link</a>"
                            return html
                        }
                    },

                ]
            });


        }

    </script>
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


    </script>
@endsection
