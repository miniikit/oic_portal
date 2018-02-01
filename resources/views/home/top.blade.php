@extends('template/master')

@section('css')
    <link rel="stylesheet" href="css/top/home_top.css">
@endsection

@section('toppage')
  <div class="parallax-container">
    <div class="parallax"><img src="/images/top_image/top_image1.jpg"></div>
  </div>
  <div class="section white">
    <div class="contents-box row container">
      <h1 class="contents_title">OIC-PORTAL</h1>
      <p class="contents_text grey-text text-darken-3 lighten-3">
        ニュースとコミュニケーションを通じで学生同士がより楽しく過ごせるシステムです
      </p>
      <div class="btn-box center">
        @if (Auth::guest())
          <div class="login-area">
            <a href="/login/google" class="login-btn waves-effect waves-light btn">ログイン</a>
          </div>
        @else
          <div class="logout-area">
            <a href="/logout" class="waves-effect waves-light btn" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
          </div>
        @endif
      </div>
    </div>
  </div>
  <div class="parallax-container">
    <div class="parallax"><img src="/images/top_image/top_image2.jpg"></div>
  </div>
@endsection

@section('script')

  <script type="text/javascript">
  $(document).ready(function(){
    $('.parallax').parallax();
  });
  </script>

@endsection
