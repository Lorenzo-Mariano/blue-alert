<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function showEditForm($id)
    {
        $article = Article::findOrFail($id);
        return view('pages.create-article', compact('article'));
    }

    public function edit(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        if ($article->author_id !== Auth::id()) {
            return redirect('/articles')->withErrors('You do not have permission to edit this article.');
        }

        $request->validate([
            'title' => 'required|max:100',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $article->title = $request->input('title');
        $article->content = $request->input('content');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');

            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $article->image = $imagePath;
        }

        $article->save();

        return redirect('/article/' . $article->id)
            ->with('success', 'Article updated successfully!');
    }
    public function destroy($id)
    {
        $article = Article::findOrFail($id);


        if ($article->author_id !== Auth::id()) {
            return redirect('/articles')->withErrors('You do not have permission to delete this article.');
        }


        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }


        $article->delete();

        return redirect('/articles')->with('success', 'Article deleted successfully!');
    }

    public function restrict($id, Request $request)
    {
        $article = Article::findOrFail($id);

        $article->is_restricted = true;
        $article->restriction_reason = $request->input('reason', 'No reason provided');
        $article->save();

        return redirect()->to("/article/{$id}")->with('status', 'Article has been restricted.');
    }
}
