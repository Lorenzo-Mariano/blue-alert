<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->author_id = Auth::id();
        $article->image = $imagePath;
        $article->save();

        return redirect('/article/' . $article->id)
            ->with('success', 'Article created successfully!');
    }
}
