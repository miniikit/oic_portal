<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> @yield('title') | OIC-Portal</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="/css/common/materialize.min.css" media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/css/common/fakeLoader.css">
    <link rel="stylesheet" href="/css/common/master.css" media="all" title="no title">
    <link rel="stylesheet" href="/css/common/reset.css" media="all" title="no title">
    @yield('css')
    @yield('plug')
</head>

<body>

<!--- ヘッダー -->
<header>
    <nav class="nav-extended">
        <div class="nav-wrapper">
            <a href="{{ route('user_home') }}" class="brand-logo center">OIC-portal</a>
            @if (Auth::guest())
              <div class="right login">
                <a href="/login/google">ログイン</a>
              </div>
            @else
              <div class="right logout">
                <a href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
              </div>
            @endif
              <a href="#" data-activates="mobile-demo" class="left side-nav-btn button-collapse"><i class="material-icons">menu</i></a>
              <ul class="side-nav" id="mobile-demo">
                <li>
                    @if(Auth::guest())
                    <li><a href="{{ route('user_home') }}">ニュース</a></li>
                    <li><a href="{{ route('user_community') }}">コミュニティ</a></li>
                    <li><a href="{{ route('user_event') }}">イベント</a></li>
                    <li><a href="{{ route('user_contact') }}">お問い合わせ</a></li>
                    <li class="in"><a href="/login/google">ログイン</a></li>
                    @else
                    <div class="user-view">
                        <div class="background"></div>
                        <a href="#!user"><img class="circle" src="{{App\Profile::find(Auth::user()->profile_id)->profile_image}}"></a>
                        <a href="#!name"><span class="black-text name">{{ Auth::user()->name }}</span></a>
                        <a href="#!email"><span class="black-text email">{{ Auth::user()->email }}</span></a>
                    </div>
                </li>
                <li><a href="{{ route('user_home') }}">トップ</a></li>
                <li><a href="{{ route('user_mypage') }}">マイページ</a></li>
                <li><a href="{{ route('user_article_write') }}">記事投稿</a></li>
                <li><a href="{{ route('user_article_favoritelist') }}">お気に入り</a></li>
                <li><a href="{{ route('user_community') }}">コミュニティ</a></li>
                <li><a href="{{ route('user_event') }}">イベント</a></li>
                <li><a href="{{ route('user_contact') }}">お問い合わせ</a></li>
                <li class="out"><a href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a></li>
               @endif
            </ul>
        </div>
        <div class="nav-tab nav-wrapper">
            <ul class="left">
              @if(Auth::guest())
                <li class="tab_link active"><a href="{{ route('user_home') }}">ホーム</a></li>
                <li class="tab_link"><a href="{{ route('user_community') }}">コミュニティ</a></li>
                <li class="tab_link"><a href="{{ route('user_event') }}">イベント</a></li>
                <li class="tab_link"><a href="{{ route('user_contact') }}">お問い合わせ</a></li>
              @else
                <li class="tab_link active"><a href="{{ route('user_home') }}">ホーム</a></li>
                <li class="tab_link"><a href="{{ route('user_mypage') }}">マイページ</a></li>
                <li class="tab_link"><a href="{{ route('user_article_write') }}">記事投稿</a></li>
                <li class="tab_link"><a href="{{ route('user_article_favoritelist') }}">お気に入り</a></li>
                <li class="tab_link"><a href="{{ route('user_community') }}">コミュニティ</a></li>
                <li class="tab_link"><a href="{{ route('user_event') }}">イベント</a></li>
                <li class="tab_link"><a href="{{ route('user_contact') }}">お問い合わせ</a></li>
               @endif
            </ul>
        </div>
    </nav>
</header>
<!--- メイン -->

@yield('toppage')

<main id="main">
    <div class="container">
        @yield('main')
    </div>
    <div class="push"></div>
</main>

<!--- フッター -->

<footer class="page-footer-another">
    <div class="footer-copyright">
        <div class="container">
            © 2017 oic-portal
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>

{{-- </div> --}}

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
