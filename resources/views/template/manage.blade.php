<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title> @yield('title') | OIC-Portal</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="/css/common/materialize.min.css" media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/css/common/manage.css" media="all" title="no title">
    <link rel="stylesheet" href="/css/common/reset.css" media="all" title="no title">
    @yield('css')
    @yield('plug')
</head>

<body>
<header>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="{{ route('manager_home') }}" class="brand-logo">OIC-Portal</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="links" href="{{ route('manager_home') }}">ホーム</a></li>
                    <li><a class="links" href="{{ route('manager_crawl_home') }}">クローラー管理</a></li>
                    <li><a class="links" href="{{ route('manager_article_list') }}">記事管理</a></li>
                    <li><a class="links" href="{{ route('manager_site_list') }}">サイト管理</a></li>
                    <li><a class="links" href="{{ route('manager_user_list') }}">ユーザ管理</a></li>
                    <li><a class="links" href="{{ route('manager_event_list') }}">イベント管理</a></li>
                    <li><a class="links" href="{{ route('manager_community_list') }}">コミュニティ管理</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a class="links" href="{{ route('manager_home') }}">ホーム</a></li>
                    <li><a class="links" href="{{ route('manager_crawl_home') }}">クローラー管理</a></li>
                    <li><a class="links" href="{{ route('manager_article_list') }}">記事管理</a></li>
                    <li><a class="links" href="{{ route('manager_site_list') }}">サイト管理</a></li>
                    <li><a class="links" href="{{ route('manager_site_list') }}">ユーザ管理</a></li>
                    <li><a class="links" href="{{ route('manager_event_list') }}">イベント管理</a></li>
                    <li><a class="links" href="{{ route('manager_community_list') }}">コミュニティ管理</a></li>
                </ul>
            </div>
            <div class="nav-wrapper">
                <div class="bread-rap">
                    @yield('breadcrumb')
                </div>
            </div>
        </nav>
    </div>
</header>

<main id="main">
    <div class="container">
        @if(isset($alerts))
            <div class="col s12 center">
                @foreach($alerts as $alert)
                    <div class="card-panel valign-wrapper red lighten-3 @yield('alert_status')">
                        <h1 class="white-text">ここに通知を表示</h1>
                    </div>
                @endforeach
            </div>
        @endif
        @yield('main')
        <div class="push"></div>
    </div>
</main>

<!--- Script -->
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/js/materialize.min.js"></script>
<script type="text/javascript">
    $('.button-collapse').sideNav({
        menuWidth: 300,
        edge: 'left',
        closeOnClick: true,
        draggable: true,
    });
</script>

@yield('script')
</body>
</html>
