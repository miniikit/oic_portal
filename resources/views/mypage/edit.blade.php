@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/mypage/mypage.css">
  <link rel="stylesheet" href="/css/mypage/edit.css">
@endsection

@section('main')
  <div class="row">

        <div class="prf-image col s12">
          <div class="profile-rap imgInput file-field input-field col s12 center">
            <div class="wap">
              <a class="clear-btn btn-floating waves-effect waves-light red"><i class="material-icons">clear</i></a>
              <img class="image-edit imgView circle" src="{{App\Profile::find(Auth::user()->profile_id)->profile_image}}" alt="">
              <a class="done-btn btn-floating waves-effect waves-light green"><i class="material-icons">done</i></a>
            </div><!--/.imgInput-->
            <div class="btn-wap center">
              <a class="image-btn waves-effect waves-light btn" name="profile_image">画像を変更<input type="file" name="profile_image"></a>
            </div>
          </div>
        </div>

      <div class="prfbox">
        <div class="username input-field">
          <div class="input-area">
            <input placeholder="名前" type="text" class="input-name validate center" name="profile_name">
          </div>
        </div>

        <div class="prf col s12">
          <div class="prf-content col s4">
            <h1 class="item" id="">投稿</h1>
            <label class="item-sub" for="">XXX</label>
          </div>
          <div class="prf-content col s4">
            <a class="color" href="{{ route('user_mypage_follow') }}"><h1 class="item" id="follow">フォロー</h1></a>
            <label class="item-sub" for="follow">{{ $follow_ct }}</label>
          </div>
          <div class="prf-content col s4">
            <a class="color" href="{{ route('user_mypage_follower') }}"><h1 class="item" id="follower">フォロワー</h1></a>
            <label class="item-sub" for="follower">{{ $follower_ct }}</label>
          </div>
        </div>

        <div class="prf col s12">
          <div class="prf-content col s4">
            <h1 class="item" id="department">学科</h1>
            <label class="item-sub" for="department">{{ $course->course_major }}</label>
          </div>
          <div class="prf-content col s4">
            <h1 class="item" id="course">コース</h1>
            <label class="item-sub" for="course">{{ $course->course_name }}</label>
          </div>
          <div class="prf-content col s4">
            <h1 class="item" id="year">学年</h1>
            <label class="item-sub" for="year">{{ $sc_year }}年</label>
          </div>
        </div>

        <div class="prf-text col s12 left-align input-field">
          <div class="input-area-other">
            <input placeholder="ポートフォリオ" type="text" class="input-text validate center">
          </div>
        </div>

        <div class="prf-text col s12 left-align input-field">
          <div class="input-area-other">
            <input placeholder="自己紹介" type="text" class="input-text validate center">
          </div>
        </div>
      </div>

      <div class="border col s12"></div>

      <div class="wap col s12">
        @for ($i=1; $i < 5; $i++)
          <div class="col s6">
            <div class="card">
              <div class="card-image">
                <a href="{{ route('user_article_detail',1) }}"><img src="/images/sample-{{ $i }}.jpg"></a>
              </div>
              <div class="card-content">
                <span class="card-title">記事タイトル</span>
                <p class="card-text">ここに記事の内容の一部を表示 ここに記事の内容の一部を表示 ここに記事の内容の一部を表示 ここに記事の内容の一部を表示</p>
              </div>
              <div class="card-action">
                <a href="{{ route('user_article_detail',1) }}">READ MORE</a>
                <div class="tags">
                  <div class="chip">
                    IT
                  </div>
                  <div class="chip">
                    デザイン
                  </div>
                  {{-- <div class="chip">
                    映像
                  </div>
                  <div class="chip">
                    アニメーション
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
        @endfor
      </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
  // 画像差し替え処理
          $(function(){
      var setFileInput = $('.imgInput'),
      setFileImg = $('.imgView');

      setFileInput.each(function(){
          var selfFile = $(this),
          selfInput = $(this).find('input[type=file]'),
          prevElm = selfFile.find(setFileImg),
          orgPass = prevElm.attr('src');

          selfInput.change(function(){
              var file = $(this).prop('files')[0],
              fileRdr = new FileReader();

              if (!this.files.length){
                  prevElm.attr('src', orgPass);
                  return;
              } else {
                  if (!file.type.match('image.*')){
                      prevElm.attr('src', orgPass);
                      return;
                  } else {
                      fileRdr.onload = function() {
                          prevElm.attr('src', fileRdr.result);
                      }
                      fileRdr.readAsDataURL(file);
                  }
              }
          });
      });
  });
  </script>

@endsection
