@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/mypage/follow.css">
@endsection

@section('main')
  <div class="row">
    <div class="col s12 center-align">
      <h1 class="title">フォロー</h1>
    </div>

    <div class="row">
      @for ($i=1; $i < 7; $i++)
        <div class="col s12">
          <div class="change card horizontal">
              <div class="card-image">
                <a href="/mypage"><img src="/images/sample-icon2.jpg" class="user-image circle"></a>
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <h1 class="card-name">ユーザー名</h1>
                  <p class="card-sentence">ここにテキスト(文字数制限を設ける予定)ここにテキスト(文字数制限を設ける予定)ここにテキスト(文字数制限を設ける予定)ここにテキスト(文字数制限を設ける予定)ここにテキスト(文字数制限を設ける予定)ここにテキスト(文字数制限を設ける予定)ここにテキスト(文字数制限を設ける予定)ここにテキスト(文字数制限を設ける予定)</p>
                </div>
                <div class="card-action">
                  <span class="date">掲載期間 2017/XX/YY ~ 2017/XX/YY</span>
                  <span class="people">xx/50</span>
                </div>
              </div>
          </div>
        </div>
      @endfor
    </div>

  </div>
@endsection

@section('script')

@endsection
