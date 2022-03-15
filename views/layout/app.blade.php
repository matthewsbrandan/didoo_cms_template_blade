<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $page_config->title ?? 'CMS' }}</title>
  <!-- Fonts -->
  <link rel="shortcut icon" href="{{ $page_config->icon ?? asset('favicon.png', true) }}" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,800;1,400&display=swap" rel="stylesheet">
  <meta name="description" content="{{ $page_config->metadescription ?? '' }}">

  @if($page_config->fonts) {!! $page_config->fonts !!} @endif
  
  <link href="{{ asset('css/global.css') }}" rel="stylesheet"/>

  @yield('head')

  @if($page_config->css)
    <style> {!! $page_config->css !!}</style>
  @endif
</head>
<body class="antialiased">
  <main>
    @yield('content')
  </main>
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  @include('utils.modalMessage')
  @yield('scripts')
</body>
</html>