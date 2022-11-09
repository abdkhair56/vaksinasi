{{--
//
//  ______    _   _           _  __      _   _     ____   ___
// |  ____|  | | | |         | |/ _|    | | | |   |___ \ / _ \
// | |__ __ _| |_| |__   __ _| | |_ __ _| |_| |__   __) | | | |
// |  __/ _` | __| '_ \ / _` | |  _/ _` | __| '_ \ |__ <| | | |
// | | | (_| | |_| | | | (_| | | || (_| | |_| | | |___) | |_| |
// |_|  \__,_|\__|_| |_|\__,_|_|_| \__,_|\__|_| |_|____/ \___/
//
// Written by Fathalfath30.
// Email : fathalfath30@gmail.com
// Follow me on:
//  Github : https://github.com/fathalfath30
//  Gitlab : https://gitlab.com/Fathalfath30
//
--}}<!doctype html>
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
