<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index(){
        $students = Student::orderBy('created_at', 'DESC')->get();

        return view("students.index", compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }


    public function store(Request $request)
    {
        Student::create($request->all());

        return redirect()->route('admin/students')->with('success', 'Siswa calon anggota ekskul berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $students = Student::findOrFail($id);

        return view('students.show', compact('students'));
    }


    public function edit(string $id)
    {
        $students = Student::findOrFail($id);

        return view('students.edit', compact('students'));
    }

    public function update(Request $request, string $id)
    {
        $students = Student::findOrFail($id);

        $students->update($request->all());

        return redirect()->route('admin/students')->with('success', 'Student updated successfully');
    }

    public function destroy(string $id)
    {
        $students = Student::findOrFail($id);

        $students->delete();

        return redirect()->route('admin/students')->with('success', 'Student deleted successfully');
    }
}