@extends('layout.main')

@section('content')
    <div style="background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
        <div class="container d-flex justify-content-center align-items-center vh-100" style="">
            <div class="row">
                <div class="col-md">
                    <img src='{{ URL::asset('svg/wallet2.svg') }}' width="100%" />
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <div class="bg-white rounded p-3 shadow">
                        <h2>Register</h2>
                        <h6>Fill in form below with your information to register as admin.</h6>
                        @if (!$error)
                            <form action="{{ route('user.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="register" name="type" />
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Your Name</label>
                                    <input type="text" class="form-control" name="name" aria-describedby="nameHelp" required
                                        placeholder="John">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
                                        placeholder="example@email.com">
                                    @if ($error && $error['email_error'])
                                        <small id="emailHelp" class="form-text text-danger">Email already used!.</small>
                                    @else
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                            anyone
                                            else.</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="********">
                                </div>
                                <div class="d-flex">
                                    <small class="my-auto mr-auto">Already have an account ? <a
                                            href="{{ route('user.index') }}">login</a>.</small>
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('user.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="register" name="type" />
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Your Name</label>
                                    <input type="text" class="form-control" name="name" aria-describedby="nameHelp"
                                        placeholder="John" value="{{ $error['name'] }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control is-invalid" name="email"
                                        aria-describedby="emailHelp" placeholder="example@email.com"
                                        value="{{ $error['email'] }}">
                                    @if ($error && $error['email_error'])
                                        <small id="emailHelp" class="form-text text-danger">Email already used!.</small>
                                    @else
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                            anyone
                                            else.</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="********">
                                </div>
                                <div class="d-flex">
                                    <small class="my-auto mr-auto">Already have an account ? <a
                                            href="{{ route('user.index') }}">login</a>.</small>
                                    <button type="submit" class="btn btn-primary">Register</button>
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
