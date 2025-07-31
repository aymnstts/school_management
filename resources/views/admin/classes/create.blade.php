@extends('.layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2>Ajouter Une Classe</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('classes.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="idclass">ID Classe</label>
                    <input type="text" class="form-control" id="idclass" name="idclass" required>
                </div>

                <div class="form-group">
                    <label for="major">Major</label>
                    <input type="text" class="form-control" id="major" name="major" required>
                </div>

                <div class="form-group">
                    <label for="studentsNumber">Nombre d'Étudiants</label>
                    <input type="text" class="form-control" id="studentsNumber" name="studentsNumber" required>
                </div>

                <div class="form-group">
                    <label for="year">Année</label>
                    <input type="text" class="form-control" id="year" name="year" required>
                </div>

                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary">Ajouter la Classe</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
