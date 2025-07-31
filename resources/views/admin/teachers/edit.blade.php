@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h1>Edit Teacher</h1>
        @isset($teacher)
        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $teacher->full_name }}" required>
            </div>
            <div class="mb-4">
                <label for="CIN" class="form-label">CIN</label>
                <input type="text" class="form-control" id="CIN" name="CIN" value="{{ $teacher->CIN }}" required>
            </div>
            <div class="mb-4">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $teacher->phone_number }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $teacher->email }}" required>
            </div>
            <div class="mb-4">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $teacher->date_of_birth }}" required>
            </div>
            <div class="mb-4">
                <label for="matricule" class="form-label">Matricule</label>
                <input type="text" class="form-control" id="matricule" name="matricule" value="{{ $teacher->matricule }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Teacher</button>
        </form>
        @endisset
    </div>
</main>
@endsection
