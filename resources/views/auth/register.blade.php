@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/auth/register.css">
@endsection

@section('main')

<div class="row_content">
  <form class="col s12">

    <div class="input-field col s6">
      <input id="name" type="text" class="validate">
      <label for="name">氏名</label>
    </div>

    <div class="input-field col s6">
      <input id="kana" type="text" class="validate">
      <label for="kana">フリガナ</label>
    </div>

    <div class="input-field col s6">
      <input id="email" type="email" class="validate">
      <label for="email">メールアドレス</label>
    </div>

    <div class="row">
      <div class="input-field col s6">
        <select>
               <option value="" disabled selected></option>
               <option value="" class="left circle">1</option>
               <option value="" class="left circle">2</option>
               <option value="" class="left circle">3</option>
               <option value="" class="left circle">4</option>
             </select>
        <label>学年</label>
      </div>

      <div class="input-field col s6">
        <select>
             <option value="" disabled selected></option>
             <option value="" class="left circle">A</option>
             <option value="" class="left circle">B</option>
             <option value="" class="left circle">C</option>
             <option value="" class="left circle">D</option>
             <option value="" class="left circle">E</option>
             <option value="" class="left circle">F</option>
             <option value="" class="left circle">G</option>
             <option value="" class="left circle">H</option>
             <option value="" class="left circle">I</option>
           </select>
        <label>クラス</label>
      </div>
    </div>

    <div class="input-field col s12">
      <select>
         <option value="" disabled selected></option>
         <option value="1">情報処理IT</option>
         <option value="2">ゲーム</option>
         <option value="3">CG・映像・アニメーション</option>
         <option value="4">デザイン・Web</option>
      </select>
     <label>学科</label>
    </div>

    <div class="input-field col s12">
      <select>
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
      <input id="portfolio" type="text" class="validate">
      <label for="portfolio">ポートフォリオ</label>
    </div>

    <div class="input-field col s6">
      <textarea id="introduction" class="materialize-textarea"></textarea>
      <label for="introduction">自己紹介</label>
    </div>

    <div class="row">
      <div class="input-field col s6"><a class="waves-effect waves-light btn">戻る</a></div>
      <div class="input-field col s6"><a class="waves-effect waves-light btn">確認</a></div>
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
