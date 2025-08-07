<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        Comment::create([
            'name' => $validated['name'],
            'comment' => $validated['comment'],
            'product_id' => $request->input('product_id'),
            'user_id' => Auth::id(), // ←ログインユーザーもセット
        ]);

        return redirect()->back()->with('success', 'コメントを送信しました');
    }
}
