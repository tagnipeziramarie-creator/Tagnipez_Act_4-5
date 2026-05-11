<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'student_id' => $request->student_id,
            'course' => $request->course,
            'year_level' => $request->year_level,
            'section' => $request->section,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Deleted successfully');
    }
}
