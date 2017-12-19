@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/articles/post.css">
  <link rel="stylesheet" href="/css/articles/edit.css">
@endsection

@section('main')

  <div class="row center-align">
    <h1 class="title">
      記事編集
    </h1>
  </div>

<div class="content">
    <form class="col s10" method="POST" action="{{ url('/articles/edit/confirm') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="input-field col s12">
      <input placeholder="タイトル" id="first_name" name="article_title" type="text" class="validate" value="{{ $article->article_title }}">
      <label for="first_name">タイトル</label>
    </div>
      <div class="input-field col s12">
        <textarea id="textarea1" class="materialize-textarea" name="article_text" data-length="120">{{ $article->article_text }}</textarea>
        <label for="textarea1">記事本文</label>
      </div>
      <div class="imgInput input-field col s12">
        <input type="file" name="article_image" value="{{ $article->article_image }}">
        <div class="image-area">
          <img class="imgView" src="{{ $article->article_image }}" alt="" >
        </div>
      </div>
      {{-- <div class="file-field input-field">

          <input type="file" multiple>
        <div class="file-path-wrapper">
         <input type="text" class="file-path validate" name="article_image" placeholder="画像選択">
          <input type="file" name="article_image" value=""/>
          <label for="image">画像選択</label>
        </div>

      </div> --}}
      <div class="row">
        <div class="input-field col s6" id="genre" placeholder="ジャンル">
          <select>
            <option value="" disabled selected></option>
            <option value="1">すべて</option>
            <option value="2">情報処理・IT</option>
            <option value="3">ゲーム</option>
            <option value="4">CG・映像・アニメーション</option>
            <option value="5">デザイン・web</option>
          </select>
          <label for="genre">ジャンル</label>
        </div>
        <div class="input-field col s6">
          <input type="text" id="date" class="datepicker">
          <label for="date">掲載期間</label>
        </div>
      </div>
      <div class="row">
        <div class="btn-box-l col s6 center-align"><button type="button" class="back-btn waves-effect waves-light btn" onclick="history.back()">戻る</button></div>
        <div class="btn-box-r col s6 center-align"><button type="submit" class="update-btn waves-effect waves-light btn">更新</button></div>
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
