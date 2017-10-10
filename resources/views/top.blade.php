@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/top/top.css">
@endsection

@section('main')
  <div id="tab1" class="col s12">
      <div class="row">
        @for ($i=0; $i < 9; $i++)
        <div id="tab1" class="col s4">
            <div class="card">
              <div class="card-image">
                <img src="images/sample-1.jpg">
                <a href="/top"></a>
              </div>
              <div class="card-content">
                <p>記事タイトル</p>
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
