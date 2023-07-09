@extends('templates.main')
@section('content')
    <div class="container">
        <div class="block-header">
            <h2>Edit Pengajuan Cuti</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative">
                    <div class="container">
                        <div class="card bg-transparent border-success mt-5">
                            <div class="card-header bg-secondary">
                                <div class="row text-white">
                                    <div class="col-md-11">
                                        Form Edit Pengajuan Cuti
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('absences.update') }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" value="{{ $absence->id }}" name="id">
                                    <div class="form-group mb-3">
                                        <label for="employee_id">Nama Karyawan</label>
                                        <select class="form-select" aria-label="Default select example" name="employee_id">
                                            <option value="" selected>Pilih Nama Karyawan</option>
                                            @foreach ($employees as $key => $employee)
                                                <option value="{{ $employee->id }}"
                                                    {{ $employee->id == old('employee_id', $absence->employee_id) ? 'selected' : '' }}>
                                                    {{ $employee->first_name }}
                                                    {{ $employee->last_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('employee_id')
                                            <label id="name-error" class="error mt-2 text-danger"
                                                for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="start_date">Tanggal Mulai</label>
                                        <input type="date"
                                            class="form-control    @error('start_date') is-invalid @enderror"
                                            name="start_date" id="start_date" placeholder="Nama"
                                            value="{{ old('start_date', $absence->start_date) }}">
                                        @error('start_date')
                                            <label id="name-error" class="error mt-2 text-danger"
                                                for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="end_date">Tanggal Selesai</label>
                                        <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                            name="end_date" id="end_date" placeholder="Nama"
                                            value="{{ old('end_date', $absence->end_date) }}">
                                        @error('end_date')
                                            <label id="name-error" class="error mt-2 text-danger"
                                                for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description">Alasan</label>
                                        <textarea name="description" id="description" cols="30" rows="3"
                                            class="form-control @error('description') is-invalid @enderror">{{ $absence->description }}</textarea>
                                        @error('description')
                                            <label id="name-error" class="error mt-2 text-danger"
                                                for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="text-end mt-5">
                                        <a href="{{ route('absences.index') }}" class="btn btn-danger">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
