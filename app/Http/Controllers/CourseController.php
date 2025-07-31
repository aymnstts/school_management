<?php

// app/Http/Controllers/CourseController.php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher')->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $majors = ClassModel::select('major')->distinct()->get();
        return view('admin.courses.create', compact('teachers', 'majors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'major' => 'required',
            'course_name' => 'required|string',
            'hours' => 'required|integer',
            'semester' => 'required|integer',
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        $teachers = Teacher::all();
        $majors = ClassModel::select('major')->distinct()->get();
        return view('admin.courses.edit', compact('course', 'teachers', 'majors'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'teacher_id' => 'required',
            'major' => 'required',
            'course_name' => 'required|string',
            'hours' => 'required|integer',
            'semester' => 'required|integer',
        ]);

        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
