@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/event/creat.css">
  <link rel="stylesheet" href="/css/event/edit.css">
@endsection

@section('main')

  <div class="row center-align">
    <h1 class="title">
      イベント編集
    </h1>
  </div>

<div class="content">
  <form class="col s10">
    <div class="input-field col s12">
      <input placeholder="イベント名" id="first_name" type="text" class="validate" value="ここに編集前のイベントタイトル">
      <label for="first_name">イベント名</label>
    </div>
    <div class="input-field col s12">
      <textarea id="textarea1" class="materialize-textarea" data-length="50"><ここに編集前のイベント内容></textarea>
      <label for="textarea1">イベント内容</label>
    </div>
    <div class="file-field input-field">
      <div class="imgInput file-path-wrapper">
        <div class="wap row">
          <input class="file-path validate" type="file" name="evet_image" placeholder="画像選択">
          <label for="image">画像選択</label>
        </div>

        <div class="img-area">
          <img class="imgView" src="/images/sample-1.jpg" alt="">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <a class="btn-floating btn-large waves-effect waves-light" id="btn1"><i class="material-icons">add</i></a>
          <div class="parent">
            <div id="hoge">
              <select>
                <option value='' disabled selected style='display:none;'>ジャンル</option>
                <option value="1">すべて</option>
                <option value="2">情報処理・IT</option>
                <option value="3">ゲーム</option>
                <option value="4">CG・映像・アニメーション</option>
                <option value="5">デザイン・web</option>
              </select>
              <a class="d_b btn-floating btn-large waves-effect waves-light" id="btn2"><i class="material-icons">delete</i></a>
            </div>
          </div>
        </div>
        <div class="input-field col s12">
          <input type="text" class="datepicker">
          <label for="password">掲載期間</label>
        </div>
      </div>
    </form>
    <div class="row">
      <div class="col s6 right-align"><button type="button" class="back-btn waves-effect waves-light btn">戻る</button></div>
      <div class="col s6 left-align"><button type="button" class="creat-btn waves-effect waves-light modal-trigger btn" href="#modal1">更新</button></div>
    </div>
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h1>変更を更新しますか？</h1>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">キャンセル</a>
          <button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>
        </div>
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

    $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
  </script>

  <script type="text/javascript">
    $( function() {
      var $content = $( '#hoge:last-child');
      $( '#btn1' ).on( 'click', function() {
        $content.clone( true ).appendTo( '.parent' );
      } );
      $( '.parent' ).on( 'click', '#btn2', function() {
        $( this ).parents( '#hoge' ).remove();
      } );
      } );
  </script>

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
