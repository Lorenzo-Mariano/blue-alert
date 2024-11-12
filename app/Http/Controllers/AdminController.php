<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $bannedUsers = User::where('is_banned', true)->get();
        $restrictedPosts = Article::where('is_restricted', true)->get();
        $users = User::all();

        return view('pages.admin.dashboard.dashboard', compact('bannedUsers', 'restrictedPosts', 'users'));
    }

    public function unrestrictArticle($id)
    {
        $article = Article::findOrFail($id);
        $article->is_restricted = false;
        $article->restriction_reason = null;
        $article->save();

        return redirect()->route('admin.dashboard')->with('article_status', 'Article has been unrestricted successfully.');
    }

    public function unbanUser(User $user)
    {
        $user->is_banned = false;
        $user->ban_reason = null;
        $user->save();

        return redirect()->route('admin.dashboard')->with('user_status', 'User has been unbanned successfully.');
    }

    public function banUser(Request $request, User $user)
    {
        if (Auth::user()->is_admin) {
            $user->is_banned = true;
            $user->ban_reason = $request->input('reason', 'No reason provided');
            $user->save();

            return redirect()->route('admin.dashboard')->with('user_status', 'User has been banned successfully.');
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    // Method to grant or revoke admin permissions
    public function toggleAdmin(User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();

        return redirect()->route('admin.dashboard')->with('perm_status', 'User admin status updated.');
    }
}
