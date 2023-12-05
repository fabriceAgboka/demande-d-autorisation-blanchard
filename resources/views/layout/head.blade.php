<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | {{env('APP_NAME')}}</title>

    <meta name="description" content="" />
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @include('layout.styles')
  </head>