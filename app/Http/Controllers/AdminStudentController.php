<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class AdminStudentController extends Controller
{
  
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    // Method to show the create student form
    public function create()
    {
        return view('admin.students.create');
    }

    // Method to store the student
    public function store(Request $request)
    {
        // Validate the request data
        // $validated = $request->validate([
        //     'matricule' => 'required|string|max:255',
        //     'nom_prenom' => 'required|string|max:255',
        //     'serie_bac' => 'required|string|max:255',
        //     'classe' => 'required|string|max:255',
        //     'groupe' => 'required|string|max:255',
        //     'sous_groupe' => 'required|string|max:255',
        //     'email' => 'required|email|unique:students,email|max:255',
        //     'cne' => 'required|string|max:255',
        //     'cin' => 'required|string|max:255',
        //     'genre' => 'required|string|max:255',
        //     'date_naissance' => 'required|date',
        //     'nationalite' => 'required|string|max:255',
        // ]);
    
        // Create a new Student instance and assign validated data to it
        $student = new Student();
        $student->matricule = $request['matricule'];
        $student->name = $request['nom_prenom'];
        $student->bac_series = $request['serie_bac'];
        $student->class = $request['classe'];
        $student->group = $request['groupe'];
        $student->subgroup = $request['sous_groupe'];
        $student->email = $request['email'];
        $student->cne_number = $request['cne'];
        $student->cin_number = $request['cin'];
        $student->gender = $request['genre'];
        $student->date_of_birth = $request['date_naissance'];
        $student->nationality = $request['nationalite'];


        $image=$request['Image'];

        $imagename=time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'),$imagename);
            
            $student->image=$imagename;
    
        // Save the student to the database
        $student->save();
    
        // Redirect back to the students route with a success message
        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }
    
    
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view("admin.students.edit", compact("student"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Student $student)
    {
        $student->matricule = $request['matricule'];
        $student->name = $request['nom_prenom'];
        $student->bac_series = $request['serie_bac'];
        $student->class = $request['classe'];
        $student->group = $request['groupe'];
        $student->subgroup = $request['sous_groupe'];
        $student->email = $request['email'];
        $student->cne_number = $request['cne'];
        $student->cin_number = $request['cin'];
        $student->gender = $request['genre'];
        $student->date_of_birth = $request['date_naissance'];
        $student->nationality = $request['nationalite'];
            
       
        $student->save();
        // Ou on peut utiliser update($request->all())
        // $stagiaire->update($request->all());
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'User deleted successfully.');
    }
    
}
