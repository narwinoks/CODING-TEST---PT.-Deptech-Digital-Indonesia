<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('features.admin.index');
    }
    public function create(Request $request)
    {
        return view('features.admin.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $data = $request->only('email', 'first_name', 'last_name');
        $data['password'] = Hash::make($request->password);
        if (User::create($data)) {
            return redirect()->route('admin.index')->with('success', 'Add Data Admin Success');
        } else {
            return redirect()->route('admin.index')->with('danger', 'Add Data Admin Failed');
        }
    }

    public function edit(Request $request, $id)
    {
        $admin = User::find($id);
        return view('features.admin.update', compact('admin'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $data = $request->only('email', 'first_name', 'last_name');
        $admin = User::find($request->id);
        if ($admin) {
            $admin->update($data);
            return redirect()->route('admin.index')->with('success', 'Update Admin Success');
        } else {
            return redirect()->route('admin.index')->with('danger', 'Data Not Found');
        }
    }
    public function destroy(Request $request, $id)
    {
        $admin = User::find($id);
        if ($admin) {
            $admin->delete();
            return redirect()->route('admin.index')->with('success', 'Delete Admin Success');
        } else {
            return redirect()->route('admin.index')->with('danger', 'Data Not Found');
        }
    }
}
