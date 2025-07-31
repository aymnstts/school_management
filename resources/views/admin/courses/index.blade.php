<!-- resources/views/courses/index.blade.php -->


@section('content')
@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h1>Courses</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add Course</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Teacher</th>
                    <th>Major</th>
                    <th>Course Name</th>
                    <th>Hours</th>
                    <th>Semester</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->teacher->full_name }}</td>
                    <td>{{ $course->major }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->hours }}</td>
                    <td>{{ $course->semester }}</td>
                    <td class="text-center">
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection

@endsection
