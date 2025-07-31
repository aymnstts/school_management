<?php

// ClassesController.php
namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::all();
        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.classes.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        // $request->validate([
        //     'idclass' => 'required|string|max:255',
        //     'major' => 'required|string|max:255',
        //     'studentsNumber' => 'required|integer',
        //     'year' => 'required|integer',
        // ]);


        // Create new class instance
        $class = new ClassModel;
        $class->idclass = $request->input('idclass');
        $class->major = $request->input('major');
        $class->studentsNumber = $request->input('studentsNumber');
        $class->year = $request->input('year');

        // Save the class to the database
        $class->save();

        // Redirect to classes index with success message
        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    
    public function edit(ClassModel $class)
    {
        return view('admin.classes.edit', compact('class'));
    }

    public function update(Request $request,ClassModel $class)
    {
        // $request->validate([
        //     'major' => 'required|string|max:255',
        //     'studentsNumber' => 'required|integer',
        //     'year' => 'required|integer',
        // ]);

        $class->major = $request->input('major');
        $class->studentsNumber = $request->input('studentsNumber');
        $class->year = $request->input('year');
        $class->save();

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy($idclass)
    {
        $class = ClassModel::findOrFail($idclass);
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
