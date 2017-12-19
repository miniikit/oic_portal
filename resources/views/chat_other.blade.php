@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/chat_other.css">
@endsection

@section('main')

  <div class="page-title">
    <h1 class="title">{{ $user->name }}</h1>
  </div>

  <div class="cont">
    <div id="app">
  <div class="row">
    <div class=" wap">
      <div class="comi">
        <div class="comment-area col s12">
          <ul class="collection">
              <li class="contact-item avatar">
                <img src="{{ $profile->profile_image }}" alt="" class="yo_t circle">
                <p class="mes">
                  <chat-log :messages="messages"></chat-log>
                </p>
              </li>
          </ul>
          <ul class="conect">
            <li class="conect-item avatar">
              <img src="" alt="" class="my_t circle">
              <p class="my_t_mes">
                ここにコメントを表示
              </p>
            </li>
          </ul>
        </div>
      </div>
      <div class="comment">
        <ul class="collection">
          <li class="collection-item avatar">
            <img src="{{ $profile->profile_image }}" alt="" class="circle">
            <chat-composer v-on:messagesent="addMessage"></chat-composer>
           <!-- <div class="wap-comment">
              <a class="comment-submit waves-effect waves-light btn"><i class="material-icons">send</i></a>
            </div> -->
          </li>
        </ul>
      </div>
    </div>
  </div>
    </div>
</div>


@endsection

@section('script')
  <script src="/js/app.js"></script>
  <script type="text/javascript">
    $('#icon_prefix2').trigger('autoresize');

    // $(document).ready(function() {
    // $('textarea#icon_prefix2').characterCounter();
  // });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
    $('.collapsible').collapsible();
  });

  </script>

@endsection
