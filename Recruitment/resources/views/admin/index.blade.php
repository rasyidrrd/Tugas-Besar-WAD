@extends('layout.main')

@section('content')
    <div class="" style="min-height: 100vh">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h2>Admin Dashboard</h2>
                <h1 class="display-4">{{ $user->name }}</h1>
                <p class="lead">{{ $user->email }}</p>
            </div>
        </div>
        <div style="background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
            <div class="container py-5">
                <h1 class="fs-1">
                    Job Vacancies
                </h1>
                <hr style="max-width: 500px" />
                <a class="btn btn-secondary mb-3" href='{{ route('vacancies.create') }}'>Add New Job Vacancies</a>
                <div class="row">
                    @if (!$jobs->isEmpty())
                        @foreach ($jobs as $key => $job)
                            <div class="col-md-3">
                                <div class="card" style="width: 100%;">
                                    <img src="{{ $job->image_path }}" class="card-img-top" alt="{{ $job->title }}"
                                        style="object-fit: cover; height: 200px;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $job->title }}</h5>
                                        <p class="card-text">
                                            @if (strlen($job->description) > 100)
                                                {{ substr($job->description, 0, 100) . '...' }}
                                            @else
                                                {{ $job->description }}
                                            @endif
                                        </p>
                                        <div class="d-flex">
                                            <a class="btn btn-success mr-2" href="{{ route('vacancies.show', $job->id) }}">
                                                Open
                                            </a>
                                            <a class="btn btn-warning mr-2" href='{{ route('vacancies.edit', $job->id) }}'>
                                                Edit
                                            </a>
                                            {{-- <form method="post" action="{{ route('vacancies.destroy', $job->id) }}">
                                                @csrf @method('delete')
                                                <button class="btn btn-danger" type="submit">
                                                    Delete
                                                </button>
                                            </form> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
