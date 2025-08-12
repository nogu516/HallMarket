<?php

namespace App\Http\Controllers;

use App\Models\Author;
// フォームリクエストの読み込み
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    // データ一覧ページの表示
    public function index()
    {
        $authors = Author::all();
        return view('index', ['authors' => $authors]);
    }

    public function store(AuthorRequest $request)
    {
        // バリデーション済みデータを取得
        $data = $request->validated();
    }
}
