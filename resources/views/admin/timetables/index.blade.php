@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h1>Timetables</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('timetables.create') }}" class="btn btn-primary mb-3">Create Timetable</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Major</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($timetables as $timetable)
                <tr>
                    <td>{{ $timetable->major }}</td>
                    <td>
                        <a href="{{ route('timetables.show', $timetable->id) }}" class="btn btn-sm btn-primary">View</a>
                        {{-- <a href="{{ route('timetables.edit', $timetable->id) }}" class="btn btn-sm btn-warning">Edit</a> --}}
                        <form action="{{ route('timetables.destroy', $timetable->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
