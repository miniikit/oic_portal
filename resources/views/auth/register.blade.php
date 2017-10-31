@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/auth/register.css">
@endsection

@section('main')

<div class="row_content">
  <form role="form" class="col s12" method="POST" action="{{ url('/register/confirm') }}">
    {{ csrf_field() }}

    <div class="input-field col s6">
      <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}">
      <label for="name">氏名</label>
    </div>

    <div class="input-field col s6">
      <input id="kana" type="text" class="validate" name="kana" value="{{ old('kana') }}">
      <label for="kana">フリガナ</label>
    </div>

    <div class="input-field col s6">
      <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
      <label for="email">メールアドレス</label>
    </div>

    <div class="row">
      <div class="input-field col s6">
        <select name="sc_year" value="{{ old('sc_year') }}">
               <option value="" disabled selected></option>
               <option value="1" class="left circle">1</option>
               <option value="2" class="left circle">2</option>
               <option value="3" class="left circle">3</option>
               <option value="4" class="left circle">4</option>
             </select>
        <label>学年</label>
      </div>

      <div class="input-field col s6">
        <select name="sc_class" value="{{ old('sc_class') }}">
             <option value="" disabled selected></option>
             <option value="A" class="left circle">A</option>
             <option value="B" class="left circle">B</option>
             <option value="C" class="left circle">C</option>
             <option value="D" class="left circle">D</option>
             <option value="E" class="left circle">E</option>
             <option value="F" class="left circle">F</option>
             <option value="G" class="left circle">G</option>
             <option value="H" class="left circle">H</option>
             <option value="I" class="left circle">I</option>
           </select>
        <label>クラス</label>
      </div>
    </div>

    <div class="input-field col s12">
        <select name="major" value="{{ old('major') }}">
            <option value="" disabled selected></option>
            <optgroup label="情報処理IT">
                <option value="1">情報処理IT</option>
                <option value="2">ゲーム</option>
                <option value="3">CG・映像・アニメーション</option>
                <option value="4">デザイン・Web</option>
            </optgroup>
        </select>
     <label>学科</label>
    </div>

    <div class="input-field col s12">
      <select name="course" value="{{ old('course') }}">
        <option value="" disabled selected></option>
        <optgroup label="情報処理IT">
          <option value="1">ITスペシャリスト専攻</option>
          <option value="2">ネットワークセキュリティ専攻</option>
          <option value="3">システムエンジニア専攻</option>
          <option value="4">ネットワークエンジニア専攻</option>
          <option value="5">Webエンジニア専攻</option>
          <option value="6">テクニカルコース</option>
          <option value="7">ネットワークシステムコース</option>
        </optgroup>

        <optgroup label="ゲーム">
          <option value="1">ゲームプログラマー専攻</option>
          <option value="2">ゲームデザイナー専攻</option>
          <option value="3">ゲームプランナー専攻</option>
          <option value="4">ゲームクリエイター専攻（PG）</option>
          <option value="5">ゲームクリエイター専攻（CG）</option>
          <option value="6">ゲームプログラムコース</option>
          <option value="7">ゲームCGデザインコース</option>
        </optgroup>

        <optgroup label="CG・映像・アニメーション">
          <option value="1">CG映像クリエイター専攻</option>
          <option value="2">CGクリエイター専攻</option>
          <option value="3">CG映像コース</option>
          <option value="4">CGアニメーションコース</option>
        </optgroup>

        <optgroup label="デザイン・Web">
          <option value="1">アートディレクター専攻</option>
          <option value="2">Webデザインコース</option>
          <option value="3">グラフィックデザインコース</option>
          <option value="4">マンガイラストコース</option>
        </optgroup>
      </select>
      <label>コース</label>
    </div>


    <div class="input-field col s6">
      <input id="portfolio" name="portfolio" type="text" class="validate" value="{{ old('portfolio') }}">
      <label for="portfolio">ポートフォリオ</label>
    </div>

    <div class="input-field col s6">
      <textarea id="introduction" name="introduction" class="materialize-textarea" value="{{ old('introduction') }}"></textarea>
      <label for="introduction">自己紹介</label>
    </div>

    <div class="row">
        <div class="col s6 center"><button type="button" class="waves-effect waves-light btn" onclick="history.back()">戻る</button></div>
        <div class="col s6 center"><button type="submit" class="waves-effect waves-light btn">確認</button></div>
    </div>

  </form>
</div>

@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });
</script>
@endsection

@endsection
