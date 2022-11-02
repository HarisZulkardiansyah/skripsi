<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Halaman Login Admin</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        @if (session()->has ('success'))
                        <div class="alert alert-succes alert-dismissible fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-ds-dismiss="alert" aria-label="close"></button>
                        </div>
                        @endif
                        @if (session()->has ('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session('loginError')}}
                            <button type="button" class="btn-close" data-ds-dismiss="alert" aria-label="close"></button>
                        </div>
                        @endif
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                            <div class="card-body">
                                <form action="/login" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3" >
                                        <input class="form-control @error ('email') is-invalid @enderror" id="email" type="email" placeholder="masukkan email" autofocus name="email" value="{{old('email')}} "required email="email" />
                                        <label for="email">Email</label>
                                        @error('email')
                                        <span class="invalid-feedback"><strong>{{$message}}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error ('password') is-invalid @enderror" id="password" type="password" placeholder="Masukkan Password" required name="password"/>
                                        <label for="password">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback"><strong>{{$message}}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary">{{__('login')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>