@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/articles/post.css">
@endsection

@section('main')

<div class="content">
    <div class="row center">
        <h1 class="title">記事投稿</h1>
    </div>
    <form class="col s10" method="POST" action="{{ url('/articles/user/confirm') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="input-field col s12">
      <input placeholder="タイトル" id="first_name" name="article_title" type="text" class="validate" required="required">
      <label for="first_name">タイトル</label>
    </div>
      <div class="input-field col s12">
        <textarea id="textarea1" class="materialize-textarea" name="article_text" data-length="500" required="required"></textarea>
        <label for="textarea1">記事本文</label>
      </div>
      {{-- <div class="input-field col s12">
        <input type="file" name="article_image" value="" />
      </div> --}}
      <div class="file-field input-field">
          <input type="file" name="article_image">
          <input class="file-path validate" type="text" name="article_image" accept="images/*" placeholder="画像選択">
          <label for="image">画像選択</label>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <select required="required" name="category">
            <option value="" disabled selected></option>
            <option value="1">情報処理・IT</option>
            <option value="2">ゲーム</option>
            <option value="3">CG・映像・アニメーション</option>
            <option value="4">デザイン・web</option>
            <option value="5">経済</option>
            <option value="6">その他</option>
          </select>
          <label>ジャンル</label>
        </div>
        <!--
        <div class="input-field col s6">
          <input type="text" class="datepicker" name="article_start_date_time" required="required">
          <label for="password">掲載期間</label>
        </div>
        -->
      </div>
      <div class="row">
        <div class="col s6 right-align"><button type="button" class="back-btn waves-effect waves-light btn" onclick="history.back()">戻る</button></div>
        <div class="col s6 left-align"><button type="submit" class="submit-btn waves-effect waves-light btn">確認</button></div>
      </div>
  </form>
</div>
</div>

@endsection

@section('script')
  <script type="text/javascript">
    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15, // Creates a dropdown of 15 years to control year,
      today: 'Today',
      clear: 'Clear',
      close: 'Ok',
      closeOnSelect: false // Close upon selecting a date,
    });
  </script>
  <script type="text/javascript">
  $(document).ready(function() {
  $('select').material_select();
});

  </script>

@endsection
