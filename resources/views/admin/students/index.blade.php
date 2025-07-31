@extends('layouts.app')

@section('content')

  
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="container mt-4">
                    <h1>Students</h1>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Matricule</th>
                                <th>Nom et Prénom</th>
                                <th>Classe</th>
                                <th>Groupe</th>
                                <th>Sous Groupe</th>
                                <th>Email</th>
                                <th>CIN</th>
                                <th>Genre</th>
                                <th>Date de Naissance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td><img src="/images/{{$student->image}}" alt="Student Image" width="50"></td>
                                <td>{{ $student->matricule }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->class }}</td>
                                <td>{{ $student->group }}</td>
                                <td>{{ $student->subgroup }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->cin_number }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->date_of_birth }}</td>
                                <td class="text-center">
                                    <form method="post" action="{{ route('students.destroy', $student->id) }}" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary d-inline-block">
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
        </div>
    </div>
  

@endsection

