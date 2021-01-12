@extends('layout.main')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Add New Job Vacancies</h1>
            <p class="lead">Fill in form below to add new job vacancies.</p>
        </div>
    </div>
    <div class="container pb-5">
        <form method="post" action="{{ route('vacancies.update', $vacancies->id) }}" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input required type="type" class="form-control" style="max-width: 500px" name='title'
                    aria-describedby="emailHelp" value="{{ $vacancies->title }}">
                <div class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Job Description</label>
                <textarea required class="form-control" name='jobdesc'
                    rows="3">{{ $vacancies->description }}</textarea>
                <div class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <label>Due Date: </label>
            <div id="datepicker" class="input-group date mb-3" style="margin-left: 0" data-date-format="mm-dd-yyyy"
                style="max-width: 300px">
                <input required value="{{ $vacancies->due_date }}" class="form-control" name='due_date' type="text"
                    readonly />
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kuota</label>
                <input required type="number" class="form-control" style="max-width: 500px" name='kuota' aria-describedby="emailHelp" value="{{$vacancies->kuota}}">
            </div>
            <div class="mb-3" style="max-width: 300px">
                <label for="formFile" class="form-label">Cover Banner Image</label>
                <input class="form-control" type="file" name="cover_image">
            </div>
            <div class="mb-3" style="max-width: 300px">
                <label for="formFile" class="form-label">Requirement and Qualification File</label>
                <input class="form-control" type="file" name="file_requirement">
            </div>
            <div class="mb-3" style="max-width: 300px">
                <label for="formFile" class="form-label">Surat Pernyataan</label>
                <input class="form-control" type="file" name="pakta_integritas">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
