@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/auth/register.css">
@endsection

@section('plug')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="/js/register.js"></script>
@endsection


@section('main')

  <div class="title">
    <p class="center-align">新規登録</p>
  </div>

<div class="row_content">
  <form role="form" id="register_form" class="col s12" method="POST" action="{{ url('/register/complete') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="icon-box file-field input-field col s12 center">
        <div class="imgInput">
          <img src="/images/profile_images/default.jpg" class="prf-icon imgView circle" alt="">
          <a class="edit-btn btn-floating waves-effect waves-light green" name="profile_image"><i class="material-icons">edit</i><input type="file" name="profile_image"></a>
          <p>※ 拡張子: jpg png</p>
        </div><!--/.imgInput-->
      </div>

    <div class="input-field col s12">
      <input id="profile_name" type="text" class="validate" name="profile_name" value="{{ old('profile_name') }}">
      <label for="profilename">プロフィール名</label>
    </div>

    <div class="input-field col s12">
      <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}">
      <label for="name">氏名</label>
    </div>

    <div class="input-field col s12">
      <input id="kana" type="text" class="validate" name="kana" value="{{ old('kana') }}">
      <label for="kana">フリガナ</label>
    </div>

    <div class="input-field col s12">
      <input id="email" type="email" class="validate" name="email" value="{{ $getUser->email }}">
      <label for="email">メールアドレス</label>
    </div>

      <div class="input-field col s12 rap">
        <select name="profile_scyear" value="{{ old('profile_scyear') }}">
               <option value="" disabled selected></option>
               <option value="1" class="left circle">1</option>
               <option value="2" class="left circle">2</option>
               <option value="3" class="left circle">3</option>
               <option value="4" class="left circle">4</option>
             </select>
        <label>学年</label>
      </div>


    <div class="input-field rap">
        <select id="categories" name="course_major" value="{{ old('course_major') }}">
            <option data-category="1" value="">学科を選択してください</option>
            <option data-category="2" value="1" class="it">情報処理IT</option>
            <option data-category="3" value="2" class="game">ゲーム</option>
            <option data-category="4" value="3" class="cg">CG・映像・アニメーション</option>
            <option data-category="5" value="4" class="design">デザイン・Web</option>
        </select>
     <label>学科</label>
    </div>

      <div class="target__select input-field rap" data-category="1">
          <select  name="course_id" value="{{ old('course_id') }}">
              <option value="" selected disabled>コースを選択してください</option>
          </select>
          <label>コース</label>
      </div>

    <div class="target__select input-field rap none" data-category="2">
      <select  name="course_id" value="{{ old('course_id') }}">
          <option value="5" class="it">ITスペシャリスト専攻</option>
          <option value="6" class="it">ネットワークセキュリティ専攻</option>
          <option value="7" class="it">システムエンジニア専攻</option>
          <option value="8" class="it">ネットワークエンジニア専攻</option>
          <option value="9" class="it">Webエンジニア専攻</option>
          <option value="10" class="it">テクニカルコース</option>
          <option value="11" class="it">ネットワークシステムコース</option>
      </select>
      <label>コース</label>
    </div>

      <div class="target__select input-field rap none" data-category="3">
          <select name="course_id" value="{{ old('course_id') }}">
              <option value="12" class="game">ゲームプログラマー専攻</option>
              <option value="13" class="game">ゲームデザイナー専攻</option>
              <option value="14" class="game">ゲームプランナー専攻</option>
              <option value="15" class="game">ゲームクリエイター専攻（PG）</option>
              <option value="16" class="game">ゲームクリエイター専攻（CG）</option>
              <option value="17" class="game">ゲームプログラムコース</option>
              <option value="18" class="game">ゲームCGデザインコース</option>
          </select>
          <label>コース</label>
      </div>

      <div class="target__select input-field rap none" data-category="4">
          <select name="course_id" value="{{ old('course_id') }}">
              <option value="19" class="cg">CG映像クリエイター専攻</option>
              <option value="20"class="cg">CGクリエイター専攻</option>
              <option value="21" class="cg">CG映像コース</option>
              <option value="22" class="cg">CGアニメーションコース</option>
          </select>
          <label>コース</label>
      </div>

      <div class="target__select input-field rap none" data-category="5">
          <select name="course_id" value="{{ old('course_id') }}">
              <option value="19" class="design">アートディレクター専攻</option>
              <option value="20" class="design">Webデザインコース</option>
              <option value="21" class="design">グラフィックデザインコース</option>
              <option value="22" class="design">マンガイラストコース</option>
          </select>
          <label>コース</label>
      </div>


    <div class="input-field col s12">
      <input id="portfolio" name="profile_url" type="text" class="validate" value="{{ old('profile_url') }}">
      <label for="portfolio">ポートフォリオ</label>
    </div>

    <div class="input-field col s12">
      <textarea id="introduction" name="profile_introduction" class="materialize-textarea" value="{{ old('profile_introduction') }}"></textarea>
      <label for="introduction">自己紹介</label>
    </div>

    <div class="row">
        <div class="col s6 center-align"><button type="button" class="back-btn waves-effect waves-light btn" onclick="history.back()">戻る</button></div>
        <div class="col s6 center-align"><button type="submit" class="submit-btn waves-effect waves-light btn">送信</button></div>
    </div>
  </form>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('select').material_select();
        });

        var form = document.getElementById("register_form");
        form.action = "/register/complete";

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
