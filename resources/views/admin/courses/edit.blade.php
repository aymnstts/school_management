

@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2>Edit Course</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        @isset($course)
        <div class="col-md-8">
            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="teacher_id">Teacher</label>
                    <select class="form-control" id="teacher_id" name="teacher_id" required>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $teacher->id == $course->teacher_id ? 'selected' : '' }}>{{ $teacher->full_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="major">Major</label>
                    <select class="form-control" id="major" name="major" required>
                        @foreach($majors as $major)
                            <option value="{{ $major->major }}" {{ $major->major == $course->major ? 'selected' : '' }}>{{ $major->major }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $course->course_name }}" required>
                </div>

                <div class="form-group">
                    <label for="hours">Hours</label>
                    <input type="number" class="form-control" id="hours" name="hours" value="{{ $course->hours }}" required>
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" class="form-control" id="semester" name="semester" value="{{ $course->semester }}" required>
                </div>

                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary">Update Course</button>
                </div>
            </form>
        </div>
        @endisset
    </div>
</main>
@endsection

