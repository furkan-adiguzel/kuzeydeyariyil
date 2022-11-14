@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Paketler ({{ $count }})</h3>
            <div class="card-tools">
                <a href="{{ route('admin.package.create') }}" class="btn btn-default btn-sm"> <i class="fa fa-plus"></i> Kayıt Ekle</a>
            </div>
        </div>
        <div class="card-body">
            <table id="datalist" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Paket</th>
                    <th>Kayıt Tarihi</th>
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


            var dataTables = $('#datalist').DataTable({
                ajax: "{{ route('admin.package.data') }}",
                language: {url: '{{ asset("admin/plugins/datatables/dataTable.tr.json") }}'},
                pageLength: 100,
                processing: true,
                serverSide: true,
                info: true,
                aaSorting: [],
                dom: '<"toolbar-pf table-view-pf-toolbar"<"row"<"col-sm-12 mb-10"B><"col-sm-6"l><"col-sm-6 pull-right"f>>>rt<"dataTables_footer"<"row"<"col-sm-6"i><"col-sm-6"p>>>',
                responsive: true,
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                columns: [
                    {data: 'p_id'},
                    {data: 'name'},
                    {data: 'created_at'},
                    {
                        data: 'p_id',
                        name: 'p_id',
                        sortable: false,
                        orderable: false,
                        searchable: false,
                        render: function (p_id, type, full, meta) {
                            var edit_url = window.route_path("{{ route('admin.package.edit', "id") }}", p_id, "id");
                            var delete_url = window.route_path("{{ route('admin.package.destroy', "id") }}", p_id, "id");

                            return '<div class="btn-group">' +
                                    '<a href="'+edit_url+'" class="btn btn-default"> Düzelt</a>' +
                                    '<button type="button" data-url="'+delete_url+'" class="btn btn-danger confirm-delete">Sil</button>' +
                                '</div>';
                        }
                    },
                ],
            });

            window.delete_confirm(dataTables);
        });
    </script>
@endsection
