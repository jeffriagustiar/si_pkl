<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'photo_path',
        'activity_date',
        'description',
        'status',
        'teacher_comment',
        'rating',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
