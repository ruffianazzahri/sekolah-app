<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index(){
        return view("students.index");
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
}