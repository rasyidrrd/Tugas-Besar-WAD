@extends('layout.main')

@section('content')
    <div style="background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
        <div class="container py-5 d-flex align-items-center" style="min-height: 100vh">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ URL::asset($job->image_path) }}" class="card-img-top" alt="{{ $job->title }}"
                        style="object-fit: cover;">
                </div>
                <div class="col-md-8 d-flex">
                    <div class="my-auto">
                        <h1 class="card-title">{{ $job->title }}</h1>
                        <h6>Due Date : {{ $job->due_date }}, Kuota dibutuhkan : {{ $job->kuota }} Orang</h6>
                        <hr />
                        <p class="card-text">
                            {{ $job->description }}
                        </p>
                        <div class="mb-3">
                            <a class="btn btn-success mr-3" download
                                href="{{ URL::asset($job->pakta_integritas) }}">Download
                                Pakta Integritas
                            </a>
                            <a class="btn btn-success mr-3" download href="{{ URL::asset($job->file_path) }}">Download
                                Qualification and Requirement
                            </a>
                            @if ($user)
                                <a class="btn btn-warning " href="{{ route('application.show', $job->id) }}">
                                    Apply Now
                                </a>
                            @else
                                <a class="btn btn-warning " href="{{ route('home.login') }}">
                                    Apply Now
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($user && $user->type == 'admin')
            <div class="container mb-5 pb-5">
                <h1 class="fs-1 mb-4">
                    Data Pelamar Lowongan
                </h1>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col-2">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">TTL</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">NIK</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Curricullum Vitae</th>
                            <th scope="col">Pakta Integritas</th>
                            <th scope="col">Approval</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($application as $key => $app)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $app->name }}</td>
                                <td>{{ $app->email }}</td>
                                <td>{{ $app->tanggal_lahir }}</td>
                                <td>{{ $app->alamat }}</td>
                                <td>{{ $app->nik }}</td>
                                <td>{{ $app->no_hp }}</td>
                                <td>
                                    <a class="btn btn-success" download href="{{ URL::asset($app->file_path) }}">
                                        Download
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success" download href="{{ URL::asset($app->pakta_integritas) }}">
                                        Download
                                    </a>
                                </td>
                                @if(!$app->tahap_2)
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Approve
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Approve {{$app->name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('application.update', $app->id)}}" method="post">
                                                    @csrf @method('put')
                                                    <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                                                        <label class="font-weight-bold">Tanggal Wawancara Tahap 2: </label>
                                                        <div id="datepicker" class="input-group date mb-3"
                                                            data-date-format="mm-dd-yyyy"
                                                            style="width: 100%">
                                                            <input required class="form-control" name='tahap_2'
                                                                type="text" />
                                                            <span class="input-group-addon"><i
                                                                    class="glyphicon glyphicon-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Approve</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @else
                                <td>Approved</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
