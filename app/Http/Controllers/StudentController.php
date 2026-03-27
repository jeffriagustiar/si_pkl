<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = auth()->user();
        $stats = [
            'total_activities' => $student->activities()->count(),
            'approved_activities' => $student->activities()->where('status', 'approved')->count(),
            'pending_activities' => $student->activities()->where('status', 'pending')->count(),
        ];
        $notifications = $student->unreadNotifications;
        return view('student.dashboard', compact('stats', 'notifications'));
    }
}
