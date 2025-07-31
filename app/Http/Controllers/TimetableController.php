<?php
namespace App\Http\Controllers;

use App\Models\Timetable;
use App\Models\TimetableEntry;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $timetables = Timetable::all();
        return view('admin.timetables.index', compact('timetables'));
    }

    public function create()
    {
        $majors = ClassModel::all();
        return view('admin.timetables.create', compact('majors'));
    }

    public function store(Request $request)
    {
        $timetable = Timetable::create(['major' => $request->major]);
    
        foreach ($request->timetable as $day => $sessions) {
            foreach ($sessions as $session) {
                if (!empty($session['subject']) && !empty($session['location']) && !empty($session['start_time']) && !empty($session['end_time'])) {
                    TimetableEntry::create([
                        'timetable_id' => $timetable->id,
                        'day' => $day,
                        'subject' => $session['subject'],
                        'location' => $session['location'],
                        'start_time' => $session['start_time'],
                        'end_time' => $session['end_time']
                    ]);
                }
            }
        }
    
        return redirect()->route('timetables.index')->with('success', 'Timetable created successfully.');
    }
    

    public function show(Timetable $timetable)
    {
        $entries = $timetable->entries;
        return view('admin.timetables.show', compact('timetable', 'entries'));
    }

    public function edit(Timetable $timetable)
    {
        $majors = ClassModel::all();
        return view('admin.timetables.edit', compact('timetable', 'majors'));
    }

    public function update(Request $request, Timetable $timetable)
    {
        $timetable->update(['major' => $request->major]);

        $timetable->entries()->delete();

        foreach ($request->timetable as $day => $sessions) {
            foreach ($sessions as $session) {
                TimetableEntry::create([
                    'timetable_id' => $timetable->id,
                    'day' => $day,
                    'subject' => $session['subject'],
                    'location' => $session['location'],
                    'start_time' => $session['start_time'],
                    'end_time' => $session['end_time']
                ]);
            }
        }

        return redirect()->route('timetables.index')->with('success', 'Timetable updated successfully.');
    }

    public function destroy(Timetable $timetable)
    {
        $timetable->delete();
        return redirect()->route('timetables.index')->with('success', 'Timetable deleted successfully.');
    }
}
