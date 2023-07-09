@extends('templates.main')
@section('content')
    <div class="container">
        <div class="block-header">
            <h2>Edit Data Karyawan</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative">
                    <div class="container">
                        <div class="card bg-transparent border-success mt-5">
                            <div class="card-header bg-secondary">
                                <div class="row text-white">
                                    <div class="col-md-11">
                                        Form Edit Data Karyawan
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('employee.update') }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" value="{{ $employee->id }}" name="id">
                                    <div class="form-group mb-3">
                                        <label for="first_name">Nama Depan</label>
                                        <input type="text"
                                            class="form-control   @error('first_name') is-invalid @enderror"
                                            name="first_name" id="first_name" placeholder="Nama"
                                            value="{{ old('first_name', $employee->first_name) }}">
                                        @error('first_name')
                                            <label id="name-error" class="error mt-2 text-danger"
                                                for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="last_name">Nama Belakang</label>
                                        <input type="text"
                                            class="form-control    @error('last_name') is-invalid @enderror"
                                            name="last_name" id="last_name" placeholder="Nama"
                                            value="{{ old('last_name', $employee->last_name) }}">
                                        @error('last_name')
                                            <label id="name-error" class="error mt-2 text-danger"
                                                for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="email"
                                            value="{{ old('email', $employee->email) }}">
                                        @error('email')
                                            <label id="name-error" class="error mt-2 text-danger"
                                                for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone">No Hp</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="phone" value="{{ $employee->phone }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select class="form-select" aria-label="Default select example" name="gender">
                                            <option selected value="">Open this select menu</option>
                                            <option value="laki laki"
                                                {{ $employee->gender == 'laki laki' ? 'selected' : '' }}>Laki Laki
                                            </option>
                                            <option value="perempuan"
                                                {{ $employee->gender == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>

                                        @error('gender')
                                            <label id="name-error" class="error mt-2 text-danger"
                                                for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="address">Alamat</label>
                                        <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ $employee->address }}</textarea>
                                    </div>
                                    <div class="text-end mt-5">
                                        <a href="{{ route('employee.index') }}" class="btn btn-danger">Kembali</a>
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
