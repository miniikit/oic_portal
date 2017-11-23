@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/community/detail.css">
@endsection

@section('main')
  <div class="row">

  <div class="page-title">
    <h1 class="title">コミュニティー名</h1>
  </div>
  <div class=" col s12 m8 l8">
    <div class="comi">
      <div class="comment-area col s12">
        <ul class="collection">
          @for ($i = 0; $i < 20; $i++)
            <li class="collection-item avatar">
              <img src="/images/sample-icon2.jpg" alt="" class="circle">
              <span class="name">name</span>
              <p>
                ここにコメントを表示
              </p>
            </li>
          @endfor
        </ul>
      </div>
    </div>
    <div class="comment">
      <ul class="collection">
        <li class="collection-item avatar">
          <img src="/images/sample-icon2.jpg" alt="" class="circle">
          <span class="name">name</span>
          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
          <div class="wap-comment">
            <a class="comment-submit waves-effect waves-light btn">コメント</a>
          </div>
        </li>
      </ul>
    </div>
  </div>


  <div class="side_contents col s12 m4 l3">
    <div class="side">
      <div class="card-panel teal white center">
        <h2>コミュニティー情報</h2>
      </div>
      <ul class="collapsible" data-collapsible="expandable">
       <li>
         <div class="collapsible-header"><i class="material-icons">fiber_new</i>新着情報</div>
         <div class="collapsible-body"><span>新着情報新着情報新着情報新着情報新着情報</span></div>
       </li>
       <li>
         <div class="collapsible-header"><i class="material-icons">account_circle</i>管理者</div>
         <div class="collapsible-body"><span>管理者について管理者について管理者について</span></div>
       </li>
       <li>
         <div class="collapsible-header"><i class="material-icons">people</i>メンバー</div>
         <div class="collapsible-body"><span>メンバー名メンバー名メンバー名メンバー名メンバー名</span></div>
       </li>
     </ul>
    </div>
    <div class="but">
      <a class="submit waves-effect waves-light btn">参加</a>
    </div>
  </div>

  </div>

@endsection

@section('script')
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
