<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = auth()->user()->activities()->latest()->get();
        return view('student.activities.index', compact('activities'));
    }

    public function create()
    {
        return view('student.activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'activity_date' => 'required|date',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('photo')->store('activities', 'public');

        Activity::create([
            'student_id' => auth()->id(),
            'activity_date' => $request->activity_date,
            'description' => $request->description,
            'photo_path' => $path,
            'status' => 'pending',
        ]);

        return redirect()->route('student.activities.index')->with('success', 'Activity uploaded successfully.');
    }

    public function edit(Activity $activity)
    {
        if ($activity->student_id !== auth()->id() || $activity->status !== 'pending') {
            abort(403, 'You can only edit pending activities.');
        }
        return view('student.activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        if ($activity->student_id !== auth()->id() || $activity->status !== 'pending') {
            abort(403);
        }

        $request->validate([
            'activity_date' => 'required|date',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only('activity_date', 'description');

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($activity->photo_path);
            $data['photo_path'] = $request->file('photo')->store('activities', 'public');
        }

        $activity->update($data);

        return redirect()->route('student.activities.index')->with('success', 'Activity updated successfully.');
    }

    public function destroy(Activity $activity)
    {
        if ($activity->student_id !== auth()->id() || $activity->status !== 'pending') {
            abort(403);
        }

        Storage::disk('public')->delete($activity->photo_path);
        $activity->delete();

        return redirect()->route('student.activities.index')->with('success', 'Activity deleted successfully.');
    }
}
