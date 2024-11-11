<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function findOne()
    {
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin ?? false,
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return response()->json([
                'message' => 'Login successful',
                'user' => Auth::user(),
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

    public function banUser(Request $request, User $user)
    {
        if (Auth::user()->is_admin) {
            $request->validate([
                'reason' => 'required|string|max:255',
            ]);

            $user->is_banned = true;
            $user->ban_reason = $request->input('reason', 'No reason provided');
            $user->save();

            return redirect('/articles')->with('status', 'User has been banned successfully.');
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }


    public function showReasonForm(Request $request)
    {
        $action = $request->query('action');
        $id = $request->query('id');

        $formAction = $action === 'banUser'
            ? route('admin.banUser', $id)
            : route('articles.restrict', $id);

        return view('pages.admin.reason-form', compact('formAction'));
    }
}
