<?php

// app/Http/Controllers/AttendanceController.php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['student', 'course'])->get();
        return view('admin.attendances.index', compact('attendances'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('admin.attendances.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'major' => 'required|string',
            'number_of_sessions' => 'required|integer',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendances.index')->with('success', 'Attendance recorded successfully');
    }

    public function edit(Attendance $attendance)
    {
        $students = Student::all();
        $courses = Course::all();
        return view('admin.attendances.edit', compact('attendance', 'students', 'courses'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'major' => 'required|string',
            'number_of_sessions' => 'required|integer',
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendances.index')->with('success', 'Attendance updated successfully');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Attendance deleted successfully');
    }
}
