@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/contact/contact.css">
@endsection

@section('main')

<div class="title">
  <p>お問い合わせ</p>
</div>
  <div class="content">
    <form role="form" id="contact_form" class="col s8" method="POST" action="{{ url('/contact/complete') }}">
      {{ csrf_field() }}
        <div class="input-field">
          <i class="material-icons prefix">account_circle</i>
          <input placeholder="ユーザ名" id="name" name="username" type="text" class="validate">
            <label for="name">ユーザ名</label>
        </div>
        <div class="input-field">
          <i class="material-icons prefix">mail</i>
          <input placeholder="メールアドレス" id="mail" name="email" type="text" class="validate">
            <label for="mail">メールアドレス</label>
        </div>
        <div class="input-field">
          <i class="material-icons prefix">content_paste</i>
          <textarea id="textarea1" class="materialize-textarea" name="contents"></textarea>
            <label for="textarea1">お問い合わせ内容</label>
        </div>
      <div class="but">
        <button type="submit" class="submit-btn waves-effect waves-light btn">送信</button>
      </div>
    </form>
      </div>



@endsection
