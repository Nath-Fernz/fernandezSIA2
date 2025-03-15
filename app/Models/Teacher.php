<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';

    protected $fillable = ['user_id', 'bio', 'hourly_rate', 'available_time_slots', 'status', 'balance'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subjects()
    {
        return $this->hasMany(TeacherSubject::class, 'teacher_id');
    }
}
