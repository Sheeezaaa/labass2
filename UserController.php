<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegistration;

class UserController extends Controller
{
    public function index()
    {
        $users = UserRegistration::all();
        return view('index', compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // ✅ VALIDATION
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_registrations,email',  
            'cnic' => 'required|digits:13',
            'telephone' => 'required|digits_between:11,15',
            'comments' => 'nullable|string',
            'file' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imageName = null;

        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $imageName);
        }

        UserRegistration::create([
            'name' => $request->name,
            'email' => $request->email,
            'cnic' => $request->cnic,
            'telephone' => $request->telephone,
            'comments' => $request->comments,
            'file' => $imageName
        ]);

        return redirect('/')->with('success', 'User added successfully!');
    }

    public function edit($id)
    {
        $user = UserRegistration::find($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = UserRegistration::find($id);

        // ✅ VALIDATION
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_registrations,email,' . $id,
            'cnic' => 'required|digits:13',
            'telephone' => 'required|digits_between:10,15',
            'comments' => 'nullable|string',
            'file' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $imageName);
            $user->photo = $imageName;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'cnic' => $request->cnic,
            'telephone' => $request->telephone,
            'comments' => $request->comments,
        ]);

        return redirect('/')->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        UserRegistration::find($id)->delete();
        return redirect('/')->with('success', 'User deleted successfully!');
    }

    public function search(Request $request)
    {
        $users = UserRegistration::where('email', 'LIKE', '%'.$request->search.'%')->get();
        return view('index', compact('users'));
    }
}