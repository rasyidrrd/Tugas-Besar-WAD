@extends('layout.main')

@section('content')
    <div style="background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="row">
                <div class="col-md">
                    <img src='{{ URL::asset('svg/finance.svg') }}' width="100%" />
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <div class="bg-white rounded p-3 shadow">
                        <h2>Admin Login</h2>
                        <h6>Login with your credentials to continue</h6>
                        @if (!$error)
                            <form action="{{ route('admin.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="login" name="type" />
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
                                        placeholder="example@email.com">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone
                                        else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="********">
                                </div>
                                <div class="d-flex">
                                    <small class="my-auto mr-auto">Don't have an account ? <a
                                            href="{{ route('admin.create') }}">register</a>.</small>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('admin.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="login" name="type" />
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control is-invalid" value="{{ $error['email'] }}"
                                        name="email" aria-describedby="emailHelp" placeholder="example@email.com">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone
                                        else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control is-invalid" name="password"
                                        placeholder="********">
                                </div>
                                <small id="emailHelp" class="form-text text-danger">Incorrect Email or Password!</small>
                                <div class="d-flex">
                                    <small class="my-auto mr-auto">Don't have an account ? <a
                                            href="{{ route('admin.create') }}">register</a>.</small>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <img src='{{ URL::asset('svg/wave1.svg') }}' width="100%" />
    </div>
@endsection
