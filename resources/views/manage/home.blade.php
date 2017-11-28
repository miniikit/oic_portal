@extends('template/manage')

@section('css')
  <link rel="stylesheet" href="/css/manage/home.css">
@endsection

@section('main')
  <div class="row">
    <div class="title-box center">
      <h1 class="title">各種通知</h1>
    </div>
    <div class="col s12 m8 l9">
      <div class="main-content">
      {{-- ここにメインコンテンツ --}}
      <div class="col s12">
        <form>
            <div class="input-field">
                <input id="search1" class="center" type="search" required>
                <label class="label-icon" for="search1"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </form>
      </div>
      <table class="table striped">
        <thead>
          <tr>
              <th class="tb-title">ここに項目名</th>
              <th class="tb-title">ここに項目名</th>
              <th class="tb-title">ここに項目名</th>
          </tr>
        </thead>

        <tbody>
          @for ($i=0; $i < 30; $i++)
            <tr class="tb-1">
              <td class="tb-text">ここに内容</td>
              <td class="tb-text">ここに内容</td>
              <td class="tb-text">ここに内容</td>
            </tr>
          @endfor
        </tbody>
      </table>
    </div>
    </div>

    <div class="col s12 m4 l3">
      {{-- ここにグラフなどのコンテンツ --}}
      <div class="side-content card-panel teal">
          <span class="white-text">

          </span>
        </div>
    </div>
  </div>
@endsection

@section('script')

@endsection
