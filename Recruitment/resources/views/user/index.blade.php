@extends('layout.main')

@section('content')
    <div class="vh-100">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h2>User Dashboard</h2>
                <h1 class="display-4">{{ $user->name }}</h1>
                <p class="lead">{{ $user->email }}</p>
            </div>
        </div>
        <div style="background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
            <div class="container">
                <h1 class="fs-1 mb-4">
                    Data Lamaran
                </h1>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col-2">No</th>
                            <th scope="col">Lowongan</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Kuota</th>
                            <th scope="col">Proses Tahap 1</th>
                            <th scope="col">Proses Tahap 2</th>
                            <th scope="col">Uploaded Pakta Integritas</th>
                            <th scope="col">Uploaded CV</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($application as $key => $app)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $app->title }}</td>
                                <td>{{ $app->due_date }}</td>
                                <td>{{ $app->kuota }}</td>
                                @if (!$app->tahap_2)
                                <td>Pending</td>
                                <td>Pending</td>
                                @else
                                <td>Lolos</td>
                                <td>{{$app->tahap_2}}</td>
                                @endif
                                <td>
                                    <a class="btn btn-success" href="{{ URL::asset($app->pakta_integritas) }}" download>
                                        Download
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ URL::asset($app->file_path) }}" download>
                                        Download
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
