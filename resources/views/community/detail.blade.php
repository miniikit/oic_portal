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
            <div class="text-area">
                <p class="main-contents-text">{{ $community->community_contents }}</p>
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
                        <div class="collapsible-body"><span>新着情報</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">account_circle</i>管理者</div>
                        <div class="collapsible-body">
                            <img src="/images/profile_images/default.jpg" alt="" class="admi circle">
                            <span class="name">name</span>
                            <p class="plink">ここにプロフィールのリンク</p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">people</i>メンバー</div>
                        @for($i=1; $i<20; $i++)
                        <div class="collapsible-body"><span>user0{{ $i }}</span></div>
                            @endfor
                    </li>
                </ul>
            </div>
            @if(!Auth::guest())
                <div class="but">
                    <a class="submit waves-effect waves-light btn">参加</a>
                </div>
            @endif
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
        $(document).ready(function () {
            $('.collapsible').collapsible();
        });

    </script>

@endsection
