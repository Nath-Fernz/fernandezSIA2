<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Add this for raw queries
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\TeacherSubject;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = DB::select("
            SELECT * FROM users
        ");
    
        return response()->json([
            'success' => true,
            'users' => $users,
            'status' => 200
        ]);
    }
    

    public function getStudents()
    {
        $students = DB::select("
            SELECT 
                s.*, 
                u.first_name, 
                u.last_name, 
                u.email
            FROM students AS s
            INNER JOIN users AS u ON s.user_id = u.id
        ");
    
        return response()->json([
            'success' => true,
            'students' => $students,
            'status' => 200
        ]);
    }
    
    public function getTeachers()
    {
        $teachers = DB::select("
            SELECT 
                t.*, 
                u.first_name, 
                u.last_name, 
                u.email
            FROM teachers AS t
            INNER JOIN users AS u ON t.user_id = u.id
        ");
    
        return response()->json([
            'success' => true,
            'teachers' => $teachers,
            'status' => 200
        ]);
    }
    

    public function getSubjects()
    {
        return response()->json([
            'success' => true,
            'subjects' => Subject::all(),
            'status' => 200
        ]);
    }

    public function getTeacherSubjects()
    {
        $teacherSubjects = DB::select("
            SELECT 
                ts.*, 
                u.first_name AS teacher_first_name, 
                u.last_name AS teacher_last_name, 
                u.email AS teacher_email,
                s.name AS subject_name
            FROM teacher_subjects AS ts
            INNER JOIN teachers AS t ON ts.teacher_id = t.id
            INNER JOIN users AS u ON t.user_id = u.id
            INNER JOIN subjects AS s ON ts.subject_id = s.id
        ");
    
        return response()->json([
            'success' => true,
            'teacher_subjects' => $teacherSubjects,
            'status' => 200
        ]);
    }
    

    public function getUserDetails()
    {
        $users = DB::table('users as u')
            ->select('u.*', 's.year_level', 't.hourly_rate', 't.status')
            ->leftJoin('students as s', 'u.id', '=', 's.user_id')
            ->leftJoin('teachers as t', 'u.id', '=', 't.user_id')
            ->get();

        return response()->json([
            'success' => true,
            'users' => $users,
            'status' => 200
        ]);
    }

    // LEVEL 3: ni sya
    public function getUserDataEloquent()
    {
        $users = User::with(['student', 'teacher'])->get();

        return response()->json([
            'success' => true,
            'users' => $users,
            'status' => 200
        ]);
    }


    public function getUsersChallenging()
{
    $users = User::with(['student', 'teacher'])->get();

    return response()->json([
        'success' => true,
        'challenging' => $users,
        'status' => 200
    ]);
}

//LEVEL 4 NI SYA Eloquent

public function getUsersDifficult()
{
    $users = User::with([
        'student' => function ($q) {
            $q->select('*');
        },
        'teacher' => function ($q) {
            $q->select('*');
        }
    ])->get();

    return response()->json([
        'success' => true,
        'difficult' => $users,
        'status' => 200
    ]);
}


}