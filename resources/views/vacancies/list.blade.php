@extends('layout.main')

@section('content')
    <div style="background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
        <div class="container py-5" style="min-height: 100vh">
            <h1 class="">
                List Lowongan Posisi
            </h1>
            <p style="max-width: 600px">

            </p>
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
                                        <a class="btn btn-warning" href='{{ route('vacancies.show', $job->id) }}'>
                                            See Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
