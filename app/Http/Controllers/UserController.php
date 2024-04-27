<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'contact_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'type' => 'required|string|in:user,admin,staff',
        ];

        // Only add position validation if the authenticated user is an officer
        if (auth()->check() && auth()->user()->type === 'staff') {
            $rules['position'] = 'nullable|string|max:255';
        }

        $validatedData = $request->validate($rules);

        // Add position to the data only if it's present in the request
        $data = $request->only('name', 'email', 'contact_number', 'address', 'type');
        if ($request->has('position')) {
            $data['position'] = $request->input('position');
        }

        $user->update($data);

        /*dd($data);*/

        return redirect()->route('users.edit', ['user' => $user->id])->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

}
