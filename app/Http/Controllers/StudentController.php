<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
class StudentController extends Controller
{


    public function index(){
        $students = Student::orderBy('created_at', 'ASC')->get();

        return view("students.index", compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'age' => 'required|integer',
            'description' => 'nullable|string',
            'status' => 'required|string|in:pending,accepted,rejected',
            'reason' => 'nullable|string',
        ]);

        // Ambil ID dan email pengguna yang saat ini login
        $userId = Auth::id();
        $userEmail = Auth::user()->email;

        $student = new Student();
        $student->name = $validatedData['name'];
        $student->class = $validatedData['class'];
        $student->age = $validatedData['age'];
        $student->description = $validatedData['description'];
        $student->status = $validatedData['status'];
        $student->reason = $validatedData['reason'];
        $student->inputted_id = $userId; // Set ID pengguna yang saat ini login
        $student->inputted_email = $userEmail; // Set email pengguna yang saat ini login
        $student->changed_by_admin = Auth::user()->name; // Set nama admin yang mengubah data
        $student->save();

        return redirect()->route('admin/students')->with('success', 'Siswa berhasil ditambahkan');
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
        $validatedData = $request->validate([
            'status' => 'required|string|in:pending,accepted,rejected',
            'reason' => 'nullable|string',
        ]);

        $students = Student::findOrFail($id);

        $students->status = $validatedData['status'];
        $students->reason = $validatedData['reason'];
        $students->changed_by_admin = Auth::user()->name;

        $students->save();

        return redirect()->route('admin/students')->with('success', 'Siswa berhasil diubah');
    }


    public function destroy(string $id)
    {
        $students = Student::findOrFail($id);

        $students->delete();

        return redirect()->route('admin/students')->with('warning', 'Siswa berhasil dihapus!');
    }
}
