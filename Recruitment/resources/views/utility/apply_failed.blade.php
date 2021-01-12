@extends('layout.main')

@section('content')
    <div class="" style="background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg');">
        <div class="container d-flex align-items-center justify-content-center flex-column" style="; min-height: 100vh">
            <img src="https://www.freeiconspng.com/thumbs/error-icon/sign-red-error-icon-1.png" style="max-width: 100px;" class="mb-4" />
            <h1 class="fs-1">
                Lamaranmu Tidak Berhasil Disubmit!
            </h1>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s,
            </p>
            <a class="btn btn-warning " href="{{ route('user.index') }}">
                Kembali ke Dashboard
            </a>
        </div>
    </div>
@endsection
