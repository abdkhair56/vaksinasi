<!doctype html>
<html lang='{{ app()->getLocale() }}'>
<head>
  @include('layouts.include.core.head')
  @include('layouts.include.homepage.head')
</head>
<body>
<header class="header_01">
  <div class="header_main">
    <div class="header_menu fixed-top">
      <div class="container">
        <div class="header_top">
          @include('layouts.include.homepage.header_top')
        </div>
      </div>
    </div>
  </div>
</header>
<main>
  <div class="fzf_page header_btm">
    <div class="container">
      <div class="d-flexd align-items-centerd fzf_cont ">
        <div>
          <h1>404</h1>
          <p>We've noticed you're lost your way, not to worry though,<br>
            <b>we can help you find your next opportunity</b>
          </p>
        </div>
      </div>
    </div>
  </div>
</main>
</body>
</html>
