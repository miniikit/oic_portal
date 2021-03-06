@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/community/creat.css">
@endsection

@section('main')

<div class="content">
  <div class="page_title center-align">
    <h1 class="title">コミュニティ作成</h1>
  </div>
  <form class="col s10" method="POST" action="{{route('user_community_create_confirm')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="input-field col s12">
      <input placeholder="コミュニティー名" id="first_name" name="community_title" type="text" class="validate" required>
      <label for="first_name">コミュニティー名</label>
    </div>
    <div class="input-field col s12">
      <textarea id="textarea1" class="materialize-textarea" name="community_contents" data-length="50" required></textarea>
      <label for="textarea1">コミュニティー内容</label>
    </div>
    <div class="file-field input-field">
      <div class="file-path-wrapper">
        <input type="file" name="community_image">
        <input class="file-path validate" type="text" name="community_image" accept="images/*" placeholder="画像選択" required>
        <label for="image">画像選択</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
          <div class="parent">
            <div id="hoge">
              <select name="community_category">
                <option value='' disabled selected style='display:none;'>ジャンル</option>
                <option value="1">趣味</option>
                <option value="2">スポーツ</option>
                <option value="3">勉強</option>
              </select>
            </div>
          </div>
        </div>
      </div>

    <div class="row">
      <div class="col s6 right-align"><button type="button" class="back-btn waves-effect waves-light btn">戻る</button></div>
      <div class="col s6 left-align"><button type="submit" class="creat-btn waves-effect waves-light btn">作成</button></div>
    </div>
  </form>
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

  </script>
@endsection
