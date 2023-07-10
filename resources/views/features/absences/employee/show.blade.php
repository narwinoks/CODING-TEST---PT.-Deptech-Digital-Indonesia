@extends('templates.main')
@section('content')
    <div class="container mt-5">
        <h4>Daftar Cuti Karyawan</h4>
        <div class="card bg-transparent border-success mt-3">
            <div class="card-header bg-secondary">
                <div class="d-flex justify-content-between text-white">
                    Detail Pengajuan Cuti
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item active" aria-current="true">Detail Karyawan</li>
                            <li class="list-group-item">Nama : {{ $data->first_name }} {{ $data->last_name }}</li>
                            <li class="list-group-item">Email : {{ $data->email }}</li>
                            <li class="list-group-item">Jenis Kelamin : {{ $data->gender }}</li>
                            <li class="list-group-item">No Telp: {{ $data->phone }}</li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>Tanggal Mulai</td>
                                <td>Tanggal Selesai</td>
                                <td>Total Durasi (Hari)</td>
                            </tr>
                            @foreach ($data->absence as $key => $absence)
                                @php
                                    $start_date = Carbon\Carbon::createFromFormat('Y-m-d', $absence->start_date);
                                    $end_date = Carbon\Carbon::createFromFormat('Y-m-d', $absence->end_date);
                                    $duration = $end_date->diffInDays($start_date) + 1;
                                @endphp
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($absence->start_date)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($absence->end_date)) }}</td>
                                    <td>{{ $duration }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('absences.employee.index') }}" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
@endsection
