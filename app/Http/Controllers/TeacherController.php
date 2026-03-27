<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;

use App\Notifications\ActivityReviewedNotification;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $teacher = auth()->user();
        $stats = [
            'total_students' => $teacher->students()->count(),
            'pending_reviews' => Activity::whereIn('student_id', $teacher->students->pluck('id'))
                ->where('status', 'pending')->count(),
        ];
        return view('teacher.dashboard', compact('stats'));
    }

    public function students()
    {
        $students = auth()->user()->students;
        return view('teacher.students.index', compact('students'));
    }

    public function showActivity(Activity $activity)
    {
        // Ensure the teacher is the pembimbing of this student
        if ($activity->student->pembimbing_id !== auth()->id()) {
            abort(403);
        }
        return view('teacher.activities.show', compact('activity'));
    }

    public function review(Request $request, Activity $activity)
    {
        if ($activity->student->pembimbing_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:approved,rejected',
            'teacher_comment' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $activity->update($request->only('status', 'teacher_comment', 'rating'));

        $activity->student->notify(new ActivityReviewedNotification($activity));

        return redirect()->route('teacher.dashboard')->with('success', 'Kegiatan berhasil ditinjau.');
    }
}
