@extends('templates.main')
@section('content')
    <div class="container">
        <div class="block-header">
            <h2>Update Data Admin</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative">
                    <div class="container">
                        <div class="card bg-transparent border-success mt-5">
                            <div class="card-header bg-secondary">
                                <div class="row text-white">
                                    <div class="col-md-11">
                                        Form Update Data Admin
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.update') }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" value="{{ $admin->id }}" name="id">
                                    <div class="form-group mb-3">
                                        <label for="first_name">Nama Depan</label>
                                        <input type="text" class="form-control " name="first_name" id="first_name"
                                            placeholder="Nama" value="{{ old('first_name', $admin->first_name) }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="last_name">Nama Belakang</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            placeholder="Nama" value="{{ old('last_name', $admin->last_name) }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="email"
                                            value="{{ old('email', $admin->email) }}">
                                        @error('email')
                                            <label id="name-error" class="error mt-2 text-danger"
                                                for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="text-end mt-5">
                                        <a href="{{ route('admin.index') }}" class="btn btn-danger">Kembali</a>
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
