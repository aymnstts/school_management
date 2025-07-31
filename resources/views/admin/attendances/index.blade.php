<!-- resources/views/attendances/index.blade.php -->

@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h1>Attendances</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">Record Attendance</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Course</th>
                    <th>Major</th>
                    <th>Number of Sessions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->student->name }}</td>
                    <td>{{ $attendance->course->course_name }}</td>
                    <td>{{ $attendance->major }}</td>
                    <td>{{ $attendance->number_of_sessions }}</td>
                    <td class="text-center">
                        <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-sm btn-primary">
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
