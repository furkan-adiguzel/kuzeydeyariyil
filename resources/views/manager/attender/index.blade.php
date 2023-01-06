@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Katılımcılar ({{ $count }})</h3>
        </div>
        <div class="card-body">
            <table id="datalist" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Kulüp</th>
                    <th>Görev</th>
                    <th>İsim Soyisim</th>
                    <th>Paket</th>
                    <th>Mobil</th>
                    <th>Ön Ödeme</th>
                    <th>Ödeme</th>
                    <th>Durumu</th>
                    <th>Giriş Durumu</th>
                    <th>Giriş Tarihi</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@section("js")
    <!-- DataTables  & Plugins -->
    <script src="{{ asset("admin/plugins/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/datatables-buttons/js/dataTables.buttons.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/jszip/jszip.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/pdfmake/pdfmake.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/pdfmake/vfs_fonts.js") }}"></script>
    <script src="{{ asset("admin/plugins/datatables-buttons/js/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/datatables-buttons/js/buttons.print.min.js") }}"></script>
    <script src="{{ asset("admin/plugins/datatables-buttons/js/buttons.colVis.min.js") }}"></script>

    <script>
        $(function () {
            $('#datalist').DataTable({
                ajax: "{{ route('manager.attender.data') }}",
                language: {url: '{{ asset("admin/plugins/datatables/dataTable.tr.json") }}'},
                order: [[ 7, "desc" ]],
                pageLength: 100,
                processing: true,
                serverSide: true,
                info: true,
                aaSorting: [],
                dom: '<"toolbar-pf table-view-pf-toolbar"<"row"<"col-sm-12 mb-10"B><"col-sm-6"l><"col-sm-6 pull-right"f>>>rt<"dataTables_footer"<"row"<"col-sm-6"i><"col-sm-6"p>>>',
                responsive: true,
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                columns: [
                    {
                        data: 'club_name',
                        name: 'club'
                    },
                    {
                        data: 'position_name',
                        name: 'position'
                    },
                    {data: 'name', render (name, type, full) {
                        return name + ' ' + full.surname;
                        }},
                    {data: 'package.name'},
                    {data: 'mobile'},
                    {data: 'paid_1_amount'},
                    {data: 'paid_2_amount'},
                    {
                        data: 'status',
                        name: 'status',
                        render: function (status) {
                            if (status === '3') {
                                console.log('status', status, '3 mu?')
                                return '<span class="badge bg-success"><i class="fa fa-check-circle"></i> Onaylandı</span>';
                            } else if (status === '2') {
                                console.log('status', status, '2 mu?')
                                return '<span class="badge bg-warning text-dark"><i class="fa fa-bell" aria-hidden="true"></i> Rezervasyon</span>';
                            }

                            return '<span class="badge bg-danger"><i class="fa fa-times-circle"></i>  Onaylanmadı</span>';
                        }
                    },
                    {
                        data: 'entered_date',
                        name: 'entered_date',
                        render: function (entered_date, type, full, meta) {
                            if (entered_date) {
                                return '<span class="badge bg-success"><i class="fa fa-bed" aria-hidden="true"></i> Otelde</span>';
                            }
                            return '<span class="badge bg-warning"><i class="fa fa-bath" aria-hidden="true"></i> Gelmedi</span>';
                        }
                    },
                    {data: 'entered_at'},
                    {
                        data: 'a_id',
                        name: 'a_id',
                        sortable: false,
                        orderable: false,
                        searchable: false,
                        render: function (a_id) {
                            var confirm_entered = window.route_path("{{ route('manager.attender.entered', ":attender") }}", a_id, ":attender");

                            return '<div class="btn-group">' +
                                    '<a href="'+confirm_entered+'" class="btn btn-warning"> Girişi Onayla</a>' +
                                '</div>';
                        }
                    },
                ],
            });
        });
    </script>
@endsection
