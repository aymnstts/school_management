@extends('.layouts.app')

@section('content')

  
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">    <div class="row mb-4">
        <div class="col-md-12">
            <h2>Ajouter Un Etudiant</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="Image" required>
                </div>

                <div class="form-group">
                    <label for="matricule">Matricule</label>
                    <input type="text" class="form-control" id="matricule" name="matricule" required>
                </div>

                <div class="form-group">
                    <label for="nom_prenom">Nom et Prénom</label>
                    <input type="text" class="form-control" id="nom_prenom" name="nom_prenom" required>
                </div>

                <div class="form-group">
                    <label for="serie_bac">Serie Bac</label>
                    <input type="text" class="form-control" id="serie_bac" name="serie_bac" required>
                </div>

                <div class="form-group">
                    <label for="classe">Classe</label>
                    <input type="text" class="form-control" id="classe" name="classe" required>
                </div>

                <div class="form-group">
                    <label for="groupe">Groupe</label>
                    <input type="text" class="form-control" id="groupe" name="groupe" required>
                </div>

                <div class="form-group">
                    <label for="sous_groupe">Sous Groupe</label>
                    <input type="text" class="form-control" id="sous_groupe" name="sous_groupe" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="cne">N° CNE</label>
                    <input type="text" class="form-control" id="cne" name="cne" required>
                </div>

                <div class="form-group">
                    <label for="cin">N° CIN</label>
                    <input type="text" class="form-control" id="cin" name="cin" required>
                </div>

                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre" required>
                </div>

                <div class="form-group">
                    <label for="date_naissance">Date de Naissance</label>
                    <input type="text" class="form-control" id="date_naissance" name="date_naissance" required>
                </div>

                <div class="form-group">
                    <label for="nationalite">Nationalité</label>
                    <input type="text" class="form-control" id="nationalite" name="nationalite" required>
                </div>

                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary">Add Student</button>
                </div>
            </form>
        </div>
    </div>
</main>

</div>
@endsection
