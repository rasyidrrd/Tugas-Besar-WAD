@extends('layout.main')

@section('content')
    <div style="background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
        <div class="container py-5 style=" min-height: 100vh">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ URL::asset($job->image_path) }}" class="card-img-top" alt="{{ $job->title }}"
                        style="object-fit: cover; max-height: 300px">
                </div>
                <div class="col-md-8 d-flex">
                    <div class="my-auto">
                        <h1 class="card-title">{{ $job->title }}</h1>
                        <h6>Due Date : {{ $job->due_date }}, Kuota dibutuhkan : {{ $job->kuota }} Orang</h6>
                        <hr />
                        <p class="card-text">
                            @if (strlen($job->description) > 200)
                                {{ substr($job->description, 0, 200) . '...' }}
                            @else
                                {{ $job->description }}
                            @endif
                        </p>
                        <div class="mb-3 d-flex">
                            <a class="btn btn-success mr-3" download
                                href="{{ URL::asset($job->pakta_integritas) }}">Download
                                Pakta Integritas
                            </a>
                            <a class="btn btn-success mr-3" download href="{{ URL::asset($job->file_path) }}">Download
                                Qualification and Requirement
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4" />
            <h1>
                Isi Form Dibawah Ini Untuk Mendaftar
            </h1>
            <p>

            </p>
            <hr />
            <div class="row mb-5">
                <div class="col-md-6">
                    <form method="post" enctype="multipart/form-data" action="{{ route('application.store') }}">
                        @csrf
                        <input type="hidden" value="{{ $job->id }}" name="vacancies_id" />
                        <div class="form-group">
                            <label for="exampleInputEmail1">Your Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="nameHelp" required
                                value="{{ $user->name }}" disabled placeholder="John">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" disabled id="exampleInputEmail1" aria-describedby="emailHelp"
                                required value="{{ $user->email }}">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <label>Tanggal Lahir: </label>
                        <div id="datepicker" class="input-group date mb-3" style="margin-left: 0"
                            data-date-format="mm-dd-yyyy" style="max-width: 300px">
                            <input required class="form-control" name='tanggal_lahir' type="text" />
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                            <textarea required class="form-control" name='alamat' rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIK</label>
                            <input type="text" class="form-control" name="nik" aria-describedby="nameHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Telepon</label>
                            <input type="text" class="form-control" name="no_telp" aria-describedby="nameHelp" required>
                        </div>
                        <div class="mb-3" style="max-width: 300px">
                            <label for="formFile" class="form-label">Curricullum Vitae</label>
                            <input required class="form-control" type="file" name="cv">
                        </div>
                        <div class="mb-3" style="max-width: 300px">
                            <label for="formFile" class="form-label">Pakta Integritas</label>
                            <input required class="form-control" type="file" name="pakta_integritas">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
