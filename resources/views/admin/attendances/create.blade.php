<!-- resources/views/attendances/create.blade.php -->

@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2>Record Attendance</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('attendances.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="student_id">Student</label>
                    <select class="form-control" id="student_id" name="student_id" required>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="course_id">Course</label>
                    <select class="form-control" id="course_id" name="course_id" required>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="major">Major</label>
                    <select class="form-control" id="major" name="major" required>
                        @foreach($courses as $course)
                            <option value="{{ $course->major }}">{{ $course->major }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="number_of_sessions">Number of Sessions</label>
                    <input type="number" class="form-control" id="number_of_sessions" name="number_of_sessions" required>
                </div>

                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary">Record Attendance</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
