@extends('template/manage')

@section('css')
  <link rel="stylesheet" href="/css/manage/detail.css">
  <link rel="stylesheet" href="/css/manage/edit.css">
@endsection

@section('main')
  <div class="row">
    <div class="title-box center">
      <h1 class="title">記事詳細</h1>
    </div>
    <form class="" enctype="multipart/form-data" method="post">
    <div class="main-content">
      <table>
        <thead>
            <tr>
              <th class="th-box">ここにタイトル</th>
              <td class="td-box input-field">
                <input type="text" class="validate">
              </td>
            </tr>
            <tr>
              <th class="th-box">ここにタイトル</th>
              <td class="td-box input-field">
                <input type="text" class="validate">
              </td>
            </tr>
            <tr>
              <th class="th-box">ここにタイトル</th>
              <td class="td-box input-field">
                <input type="text" class="validate">
              </td>
            </tr>
            <tr>
              <th class="th-box">ここにタイトル</th>
              <td class="td-box input-field">
                <input type="text" class="validate">
              </td>
            </tr>
            <tr>
              <th class="th-box">ここにタイトル</th>
              <td class="td-box input-field">
                <input type="text" class="validate">
              </td>
            </tr>
            <tr>
              <th class="th-box">ここに日付</th>
              <td class="td-box input-field">
                <input type="text" class="datepicker">
              </td>
            </tr>
            <tr>
              <th class="th-box">ここに画像</th>
              <td class="td-box input-field">
                <div class="file-field input-field">
                    <input type="file">
                    <input class="file-path validate" type="text" name="userfile" accept="images/*">
                </div>
              </td>
            </tr>
        </thead>
      </table>
    </div>
    <div class="btn-box col s12">
      <div class="col s6 center">
        <a class="back-btn waves-effect waves-light btn">戻る</a>
      </div>
      <div class="col s6 center">
        <a class="edit-btn waves-effect waves-light btn">更新</a>
      </div>
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


  $(function() {
  $('input[type=file]').after('<span></span>');

  // アップロードするファイルを選択
  $('input[type=file]').change(function() {
    var file = $(this).prop('files')[0];

    // 画像以外は処理を停止
    if (! file.type.match('image.*')) {
      // クリア
      $(this).val('');
      $('span').html('');
      return;
    }

    // 画像表示
    var reader = new FileReader();
    reader.onload = function() {
      var img_src = $('<img>').attr('src', reader.result);
      $('span').html(img_src);
    }
    reader.readAsDataURL(file);
  });
  });

  </script>
@endsection
