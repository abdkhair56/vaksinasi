{{--
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
--}}<!DOCTYPE html>
<html lang='{{ app()->getLocale() }}'>
<head>
  <meta charset='UTF-8' />
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="apple-touch-icon" href="{{asset('conference/images/apple-touch-icon.png')}}">
  <link rel='stylesheet' href='{{ asset('conference/css/all.css?v=4428') }}' />

  <title>Interview PLN :: Video Conference</title>

  {{-- react stylesheet --}}
  <link rel='stylesheet' href='{{ asset('css/App.css') }}' />
</head>
<body>
<div id='root'></div>
<script type='text/javascript' src='{{ asset('vendors/jitsi/lib-jitsi-meet.min.js') }}'></script>
{{-- react javascript --}}
<script type='text/javascript' src='{{ asset('js/App.js') }}'></script>
</body>
</html>
