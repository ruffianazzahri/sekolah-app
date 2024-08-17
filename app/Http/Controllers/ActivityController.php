<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $activity = Activity::orderBy('created_at', 'ASC')->get();

        return view("activity.index", compact('activity'));
    }

    public function create()
    {
        return view('activity.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'day' => 'required|string|max:255',
            'time_start' => 'required|string|max:255',
            'time_end' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mentor' => 'nullable|string',
        ]);

        $activity = new Activity();
        $activity->day = $validatedData['day'];
        $activity->time_start = $validatedData['time_start'];
        $activity->time_end = $validatedData['time_end'];
        $activity->description = $validatedData['description'];
        $activity->mentor = $validatedData['mentor'];
        $activity->inputted_id = Auth::id(); // Set the ID of the authenticated user
        $activity->inputted_email = Auth::user()->email; // Set the email of the authenticated user
        $activity->save();

        return redirect()->route('admin/activity')->with('success', 'Aktivitas berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $activity = Activity::findOrFail($id);

        return view('activity.show', compact('activity'));
    }

    public function edit(string $id)
    {
        $activity = Activity::findOrFail($id);

        return view('activity.edit', compact('activity'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'day' => 'required|string|max:255',
            'time_start' => 'required|string|max:255',
            'time_end' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mentor' => 'nullable|string',
        ]);

        $activity = Activity::findOrFail($id);

        $activity->day = $validatedData['day'];
        $activity->time_start = $validatedData['time_start'];
        $activity->time_end = $validatedData['time_end'];
        $activity->description = $validatedData['description'];
        $activity->mentor = $validatedData['mentor'];
        $activity->inputted_id = Auth::id(); // Set the ID of the authenticated user
        $activity->inputted_email = Auth::user()->email; // Set the email of the authenticated user
        $activity->save();

        return redirect()->route('admin/activity')->with('success', 'Aktivitas berhasil diubah');
    }

    public function destroy(string $id)
    {
        $activity = Activity::findOrFail($id);

        $activity->delete();

        return redirect()->route('admin/activity')->with('warning', 'Aktivitas berhasil dihapus!');
    }

}
