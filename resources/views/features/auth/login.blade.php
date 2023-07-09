<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login to app</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
</head>

<body>
    <main class="">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-8 mt-5">
                    <div class="card">
                        <div class="card-body py-3">
                            <form method="POST" action="{{ route('processLogin') }}">
                                @method('POST')
                                @csrf
                                <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="enter your email here !">
                                    <label for="email">Email address</label>
                                </div>
                                @error('email')
                                    <label id="name-error" class="error mt-2 text-danger"
                                        for="name">{{ $message }}</label>
                                @enderror
                                <div class="form-floating my-2">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                @error('password')
                                    <label id="name-error" class="error mt-2 text-danger"
                                        for="name">{{ $message }}</label>
                                @enderror
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/bs-notify/bs-notify.min.js') }}"></script>
    @include('templates.alert')
</body>

</html>
