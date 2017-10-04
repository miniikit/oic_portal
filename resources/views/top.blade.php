@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/top/top.css">
@endsection

@section('main')
  <div id="tab1" class="col s12">
      <div class="row">
        @for ($i=0; $i < 3; $i++)
        <div id="tab1" class="col s4">
            <div class="card">
              <div class="card-image">
                <img src="images/sample-1.jpg">
                <span class="card-title">記事タイトル</span>
              </div>
              <div class="card-content">
                <p>ここに記事の内容の一部を表示</p>
              </div>
              <div class="card-action">
                <a href="#">This is a link</a>
              </div>
            </div>
        </div>
        @endfor
      </div>

      <div class="row">
        @for ($i=0; $i < 2; $i++)
        <div id="tab1" class="col s6">
            <div class="card">
              <div class="card-image">
                <img src="images/sample-1.jpg">
                <span class="card-title">記事タイトル</span>
              </div>
              <div class="card-content">
                <p>ここに記事の内容の一部を表示</p>
              </div>
              <div class="card-action">
                <a href="#">This is a link</a>
              </div>
            </div>
        </div>
        @endfor
      </div>

      <div class="row">
        @for ($i=0; $i < 3; $i++)
        <div id="tab1" class="col s4">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="images/sample-2.jpg">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">記事タイトル<i class="material-icons right">more_vert</i></span>
              <p><a href="#">This is a link</a></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">記事タイトル<i class="material-icons right">close</i></span>
              <p>ここに記事の内容の一部を表示</p>
            </div>
          </div>
        </div>
        @endfor
     </div>

     <div class="row">
       @for ($i=0; $i < 2; $i++)
       <div id="tab1" class="col s6">
         <div class="card">
           <div class="card-image waves-effect waves-block waves-light">
             <img class="activator" src="images/sample-2.jpg">
           </div>
           <div class="card-content">
             <span class="card-title activator grey-text text-darken-4">記事タイトル<i class="material-icons right">more_vert</i></span>
             <p><a href="#">This is a link</a></p>
           </div>
           <div class="card-reveal">
             <span class="card-title grey-text text-darken-4">記事タイトル<i class="material-icons right">close</i></span>
             <p>ここに記事の内容の一部を表示</p>
           </div>
         </div>
       </div>
       @endfor
    </div>

  <div id="tab2" class="col s12">
    ニュースを表示
  </div>

  <div id="tab3" class="col s12">
    Test 3
  </div>

  <div id="tab4" class="col s12">
    コミュニティを表示
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    $(".button-collapse").sideNav();
  </script>
@endsection
