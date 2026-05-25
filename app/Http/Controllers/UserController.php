<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
public function index()
{
return view('admin.users',['users'=> User::all()]);
}

public function create()
{
return view('admin.create');
}

public function store(Request $request)
{
User::create([
'name'=> $request ->name,
'email'=> $request ->email,
'password'=> bcrypt($request->password),
]);
return redirect()->route('users.index')->with('success','User created successfully.');
}

public function edit($id)
{
    $user = user::findOrFail($id);
    return view('admin.edit', compact('user'));
}
public function update(Request $request, int $id)
{
    $user = User::findOrFail($id);
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);
    return redirect()->route('users.index')->with('success','User update successfully');
}
public function destroy($id)
{
    $user = user::findOrFail($id);
    $user -> delete();
    return redirect()->route('users.index')->with ('success', 'user deleted successfully.');
}
}   