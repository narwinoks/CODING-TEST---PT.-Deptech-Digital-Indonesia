@extends('templates.main')
@section('content')
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Admin</h5>
                    <p class="card-text">Total admin terdaftar</p>
                    <h3 class="card-number">{{ $admin }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Karyawan</h5>
                    <p class="card-text">Total Karyawan terdaftar</p>
                    <h3 class="card-number">{{ $employee }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pengajuan Cuti</h5>
                    <p class="card-text">Jumlah Pengajuan Cuti</p>
                    <h3 class="card-number">{{ $absence }}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
