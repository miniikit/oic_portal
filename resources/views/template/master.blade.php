<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> @yield('title') | OIC-Portal</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="css/common/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/css/common/master.css" media="all" title="no title">
    <link rel="stylesheet" href="/css/common/reset.css" media="all" title="no title">
    @yield('css')
    @yield('plug')
  </head>
  <body>

    <!--- ヘッダー --->

    <header>
        <nav class="nav-extended">
          <div class="nav-wrapper">
            <a href="#" class="brand-logo center">OIC-portal</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
              <ul class="side-nav" id="mobile-demo">
                <li>
                  <div class="user-view">
                    <div class="background"></div>
                    <a href="#!user"><img class="circle" src="images/example.jpg"></a>
                    <a href="#!name"><span class="black-text name">rentaro</span></a>
                    <a href="#!email"><span class="black-text email">rentaro@oic.jp</span></a>
                  </div>
                </li>
                  <li><a href="#">page１</a></li>
                  <li><a href="#">page2</a></li>
                  <li><a href="#">page3</a></li>
              </ul>
          </div>

          <div class="nav-content">
            <ul class="tabs tabs-transparent">
              <li class="tab"><a class="active" href="#tab1">topニュースランキング</a></li>
              <li class="tab"><a href="#tab2">ニュースジャンル1</a></li>
              <li class="tab"><a href="#tab3">ニュースジャンル2</a></li>
              <li class="tab"><a href="#tab4">コミュニティ</a></li>
            </ul>
          </div>
        </nav>
    </header>

    <!--- メイン --->

    <main id="main">
      <div class="container">
        @yield('main')
      </div>
      <div class="push"></div>
    </main>

    <!--- フッター --->

    <footer class="page-footer-another">
          <div class="footer-copyright">
            <div class="container">
            © 2017 oic-portal
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
    </footer>

    <!--- Script --->
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
      $(".button-collapse").sideNav();
    </script>
    @yield('script')
  </body>
</html>
