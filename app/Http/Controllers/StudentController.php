<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_code' => 'required|unique:students',
            'first_name_th' => 'required',
            'last_name_th' => 'required',
            'national_id' => 'required|size:13',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'บันทึกข้อมูลนักศึกษาสำเร็จ');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'อัปเดตข้อมูลสำเร็จ');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'ลบข้อมูลสำเร็จ');
    }
}