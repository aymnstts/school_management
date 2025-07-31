
@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2>Add Course</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="teacher_id">Teacher</label>
                    <select class="form-control" id="teacher_id" name="teacher_id" required>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="major">Major</label>
                    <select class="form-control" id="major" name="major" required>
                        @foreach($majors as $major)
                            <option value="{{ $major->major }}">{{ $major->major }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" class="form-control" id="course_name" name="course_name" required>
                </div>

                <div class="form-group">
                    <label for="hours">Hours</label>
                    <input type="number" class="form-control" id="hours" name="hours" required>
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" class="form-control" id="semester" name="semester" required>
                </div>

                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary">Add Course</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection


