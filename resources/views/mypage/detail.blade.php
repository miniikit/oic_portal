@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/mypage/mypage.css">
@endsection

@section('main')
  <div class="row">

        <div class="profile col s12">
          <div class="profile-rap col s12 center">
            <img class="image circle" src="{{App\Profile::find(Auth::user()->profile_id)->profile_image}}" alt="">
            <a href="{{ route('user_mypage_edit') }}" class="edit-btn btn-floating waves-effect waves-light green"><i class="material-icons">edit</i></a>
          </div>
        </div>

      <div class="prfbox col s12">
        <div class="username center-align">
          <h1>{{ $profile->profile_name }}</h1>
        </div>

        <div class="prf col s12">
          <div class="prf-content col s4">
            <h1 class="item" id="">投稿</h1>
            <label class="item-sub" for="">{{ $myarticle_ct }}</label>
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

        <div class="prf-text col s12 life-align">
          <h2 class="text">{{ $profile->profile_url }}</h2>
        </div>

        <div class="prf-text col s12 left-align">
          <h2 class="text">{{ $profile->profile_introduction }}</h2>
        </div>
      </div>

      <div class="border col s12"></div>

      <div class="wap col s12">
        @foreach($articles as $article)
          <div class="col s4">
            <div class="card hoverable">
              <div class="card-image">
                <a href="{{ $article->article_url }}"><img src="{{ $article->article_image }}"></a>
  {{--  ここにタグの実装  --}}<span class="ct-tag chip btn-floating halfway-fab circle blue-grey lighten-5">IT</span>
              </div>
            <div class="card-stacked">
              <a class="link-box" href="{{ $article->article_url }}"></a>
              <div class="card-content">
                <span class="card-title">{{ $article->article_title }}</span>
                <p class="card-text">{{ $article->article_text }}</p>
              </div>
              <div class="card-action">
                <a href="{{ $article->article_url.'/edit' }}" class="btn-floating waves-effect waves-light green"><i class="material-icons">edit</i></a>
                <a href="#modal1" class="modal-trigger btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></a>
                <div id="modal1" class="modal">
                  <div class="modal-content">
                    <h1>削除しますか？</h1>
                  </div>
                  <div class="modal-footer">
                    <a href="{{ $article->article_url.'/delete' }}" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>
                  </div>
                </div>
              </div>
              {{-- <div class="card-action">
                <div class="tags">
                  <div class="chip">
                    IT
                  </div>
                  <div class="chip">
                    デザイン
                  </div>
                  <div class="chip">
                    映像
                  </div>
                  <div class="chip">
                    アニメーション
                  </div>
                </div>
              </div> --}}
              </div>
            </div>
            </div>
          @endforeach
        </div>
      </div>

  </div>

@endsection

@section('script')
  <script type="text/javascript">
      $(document).ready(function(){
          // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
          $('.modal').modal();
      });
      </script>
@endsection
