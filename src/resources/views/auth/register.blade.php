@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/register.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="register-container">
    <h2 class="register-title">会員登録</h2>

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}">
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">確認用パスワード</label>
            <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
            @error('password_confirmation')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="register-button">登録する</button>
    </form>

    <div class="login-link">
        <a href="{{ route('login') }}">ログインはこちら</a>
    </div>
</div>
@endsection