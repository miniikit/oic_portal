@extends('template.master')

@section('css')

@endsection

@section('main')

    <div class="row col s8">
        <div class="content">
            <div class="center-align">
                <p class="text">プロフィールの編集が完了しました。</p>
            </div>
        </div>
        <div class="row col s12">
            <div class="center-align"><a type="button" class="waves-effect waves-light btn" href="{{ route('user_mypage') }}">マイページへ</a></div>
        </div>
    </div>


@endsection