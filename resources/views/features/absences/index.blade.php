@extends('templates.main')
@section('content')
    <div class="container">
        <a href="{{ route('admin.create') }}" class="btn btn-success btn-sm mt-5">Tambah</a>
        <div class="card bg-transparent border-success mt-3">
            <div class="card-header bg-secondary">
                <div class="d-flex justify-content-between text-white">
                    Daftar Pengajuan Cuti
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table-admin">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Karyawan</td>
                                <td>Tanggal Mulai</td>
                                <td>Tanggal Selesai</td>
                                <td>Alasan</td>
                                <td>Action</td>
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
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/data-tables/dataTables.bootstrap5.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/data-tables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/data-tables/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(document).ready(function() {

        });
        var table = $('#table-admin').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            scrollY: true,
            scrollCollapse: true,
            ajax: '{{ route('data.dataAdmin') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },

                {
                    data: 'first_name'
                },
                {
                    data: 'last_name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'email'
                },
                {
                    data: 'action'
                }
            ],
            "aLengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "All"]
            ],
            "iDisplayLength": 10,
            "language": {
                search: ""
            }
        });
    </script>
@endpush
