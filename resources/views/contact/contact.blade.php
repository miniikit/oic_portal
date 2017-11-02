@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/contact/contact.css">
@endsection

@section('main')

<div class="title">
  <p>お問い合わせ</p>
</div>
  <div class="content">
      <form class="col s8">
        <div class="input-field">
          <i class="material-icons prefix">account_circle</i>
          <input placeholder="ユーザー名" id="name" type="text" class="validate">
            <label for="name">ユーザー名</label>
        </div>
        <div class="input-field">
          <i class="material-icons prefix">mail</i>
          <input placeholder="メールアドレス" id="mail" type="text" class="validate">
            <label for="mail">メールアドレス</label>
        </div>
        <div class="input-field">
          <i class="material-icons prefix">content_paste</i>
          <textarea id="textarea1" class="materialize-textarea"></textarea>
            <label for="textarea1">お問い合わせ内容</label>
        </div>
      </form>
      <div class="but">
        <a class="waves-effect waves-light btn">送信</a>
      </div>
  </div>


@endsection
