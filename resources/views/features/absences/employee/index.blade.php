@extends('templates.main')
@section('content')
    <div class="container mt-5">
        <h4>Daftar Cuti Karyawan</h4>
        <div class="card bg-transparent border-success mt-3">
            <div class="card-header bg-secondary">
                <div class="d-flex justify-content-between text-white">
                    Daftar Pengajuan Cuti Karyawan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table-employee-absence">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Karyawan</td>
                                <td>Total Pengajuan Cuti</td>
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
        var table = $('#table-employee-absence').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            scrollY: true,
            scrollCollapse: true,
            ajax: '{{ route('data.absencesEmployee') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },

                {
                    data: 'full_name'
                },
                {
                    data: 'total'
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
