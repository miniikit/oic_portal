@extends('template.master')

@section('css')
<link rel="stylesheet" href="/css/mypage/complete.css">
@endsection

@section('main')

    <div class="row">
        <div class="content">
            <div class="center-align">
                <h1 class="com-text">プロフィールの編集が完了しました。</h1>
            </div>
        </div>
        <div class="row">
            <div class="center-align">
              <a type="button" class="done-btn waves-effect waves-light btn" href="{{ route('user_mypage') }}">マイページへ</a>
            </div>
        </div>
    </div>


@endsection
