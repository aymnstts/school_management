@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h1>Edit Class</h1>
        @isset($class)
        <form action="{{ route('classes.update', $class->idclass) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="idclass" class="form-label">Class ID</label>
                <input type="text" class="form-control" id="idclass" name="idclass" value="{{ $class->idclass }}" required>
            </div>
            <div class="mb-4">
                <label for="major" class="form-label">Major</label>
                <input type="text" class="form-control" id="major" name="major" value="{{ $class->major }}" required>
            </div>
            <div class="mb-4">
                <label for="name" class="form-label">Number of Students</label>
                <input type="text" class="form-control" id="name" name="studentsNumber" value="{{ $class->studentsNumber }}" required>
            </div>
            <div class="mb-4">
                <label for="year" class="form-label">Year</label>
                <input type="text" class="form-control" id="year" name="year" value="{{ $class->year }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Class</button>
        </form>
        @endisset
    </div>
</main>
@endsection
