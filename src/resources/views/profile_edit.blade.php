@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile_edit.css') }}">
@endsection

@section('content')
<div class="profile-edit-container">
    <h1 class="page-title">プロフィール設定</h1>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-form">
        @csrf
        <input type="file" name="profile_image" id="profileImage" hidden>
        <div class="image-upload">
            <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/default-profile.png' ) }}" class="profile-img" id="previewImage">
            <label for="profileImage" class="image-select-btn">
                画像を選択する
            </label>
        </div>

        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name ?? '') }}">
            @error('name')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <label for="postcode">郵便番号</label>
            <input type="text" id="postcode" name="postcode" value="{{ old('postcode', $user->postcode) }}">
            @error('postcode')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <label for="address">住所</label>
            <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}">
            @error('address')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <label for="building">建物名</label>
            <input type="text" id="building" name="building" value="{{ old('building', $user->building) }}">
            @error('building')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror

        </div>

        <button type="submit" class="update-btn">更新する</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('profileImage').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('previewImage').src = event.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection