<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'CIN' => 'required|string|max:20|unique:teachers',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:teachers',
            'date_of_birth' => 'required|date',
            'matricule' => 'required|string|max:50|unique:teachers',
        ]);

        Teacher::create($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'CIN' => 'required|string|max:20|unique:teachers,CIN,' . $teacher->id,
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:teachers,email,' . $teacher->id,
            'date_of_birth' => 'required|date',
            'matricule' => 'required|string|max:50|unique:teachers,matricule,' . $teacher->id,
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
