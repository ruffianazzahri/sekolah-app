<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Activity;
class HomeController extends Controller
{
    //

    public function index(){
        return view("home");
    }

    public function aboutus(){
        return view("aboutus");
    }

    public function adminHome()
    {
        return view('dashboard');
    }

    public function studentprofilepage()
    {
        return view('studentprofile');
    }

    public function updatestudentprofile(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:6',
        ]);


        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];


        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }
    /** @var \App\Models\User $user **/
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    public function students(){
        $students = Student::orderBy('created_at', 'ASC')->get();

        return view("students", compact('students'));
    }
    public function createstudent()
    {
        $userId = auth()->id();

        $existingStudent = Student::where('inputted_id', $userId)->first();

        if ($existingStudent) {
            switch ($existingStudent->status) {
                case 'accepted':
                    session()->flash('success', 'Selamat, Anda diterima! Silakan hubungi admin untuk informasi lebih lanjut.');
                    break;

                case 'pending':
                    session()->flash('warning', 'Anda telah mengisi form ini sebelumnya. Mohon cek berkala status anda di halaman daftar calon peserta!');
                    break;

                case 'rejected':
                    session()->flash('danger', 'Maaf, Anda ditolak. Silakan daftar pada periode berikutnya. Pantau informasi di majalah dinding sekolah untuk melihat pendaftaran periode berikutnya.');
                    break;
            }
            $existingStudentData = $existingStudent;
        } else {
            $existingStudentData = null;
        }

        return view('createstudent', compact('existingStudentData'));
    }




    public function storestudent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'age' => 'required|integer',
            'description' => 'nullable|string',
            'status' => 'required|string|in:pending,accepted,rejected',
            'reason' => 'nullable|string',
        ]);


        $userId = Auth::id();
        $userEmail = Auth::user()->email;

        $student = new Student();
        $student->name = $validatedData['name'];
        $student->class = $validatedData['class'];
        $student->age = $validatedData['age'];
        $student->description = $validatedData['description'];
        $student->status = $validatedData['status'];
        $student->reason = $validatedData['reason'];
        $student->inputted_id = $userId;
        $student->inputted_email = $userEmail;
        $student->changed_by_admin = Auth::user()->name;
        $student->save();

        return redirect()->route('students')->with('success', 'Selamat! Anda berhasil mendaftar! Mohon cek web berkala untuk melihat status pertimbangan apakah anda diterima/ditolak');
    }

    public function show(string $id)
    {
        $students = Student::findOrFail($id);

        return view('students.show', compact('students'));
    }

    public function activity(){
        $activity = Activity::orderBy('created_at', 'ASC')->get();

        return view("activity", compact('activity'));
    }

}