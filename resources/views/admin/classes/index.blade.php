@extends('.layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h1>Classes</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('classes.create') }}" class="btn btn-primary mb-3">Ajouter Une Classe</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Classe</th>
                    <th>Major</th>
                    <th>Nombre d'Étudiants</th>
                    <th>Année</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classes as $class)
                <tr>
                    <td>{{ $class->idclass }}</td>
                    <td>{{ $class->major }}</td>
                    <td>{{ $class->studentsNumber }}</td>
                    <td>{{ $class->year }}</td>
                    <td class="text-center">
                        <form method="post" action="{{ route('classes.destroy', $class->idclass) }}" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('classes.edit', $class->idclass) }}" class="btn btn-sm btn-primary d-inline-block">
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
