@extends('templates.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 position-relative">
                <div class="container">
                    <div class="card bg-transparent border-success mt-5">
                        <div class="card-header bg-secondary">
                            <div class="row text-white">
                                <div class="col-md-11">
                                    Form Edit Profile
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('updateProfile') }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="Email"
                                        value="{{ old('email', Auth::user()->email) }}">
                                    @error('email')
                                        <label id="name-error" class="error mt-2 text-danger"
                                            for="name">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                        name="first_name" id="first_name" placeholder="First Name"
                                        value="{{ old('first_name', Auth::user()->first_name) }}">
                                    @error('first_name')
                                        <label id="name-error" class="error mt-2 text-danger"
                                            for="name">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="last_name">First Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        name="last_name" id="last_name" placeholder="Last Name"
                                        value="{{ old('last_name', Auth::user()->last_name) }}">
                                    @error('last_name')
                                        <label id="name-error" class="error mt-2 text-danger"
                                            for="name">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="text-end mt-5">
                                    <a href="{{ route('home.index') }}" class="btn btn-danger">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
