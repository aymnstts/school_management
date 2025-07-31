@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h1>Teachers</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add Teacher</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>CIN</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Matricule</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->full_name }}</td>
                    <td>{{ $teacher->CIN }}</td>
                    <td>{{ $teacher->phone_number }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->date_of_birth }}</td>
                    <td>{{ $teacher->matricule }}</td>
                    <td class="text-center">
                        <form method="post" action="{{ route('teachers.destroy', $teacher->id) }}" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-primary d-inline-block">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="submit" class="btn btn-sm btn-danger d-inline-block">
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
