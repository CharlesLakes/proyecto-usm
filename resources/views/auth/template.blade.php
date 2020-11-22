<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="title" content="Inicia o registrate">
    <meta name="description" content="Inicia sesión y sigue aprendiendo con tus compañeros en esta plataforma">
    <meta name="keywords" content="login,register,usm">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="Spanish">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login or Register</title>
    <script src="https://kit.fontawesome.com/5b04273445.js" crossorigin="anonymous"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
      integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
      integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{asset('css/login.css')}}" />
  </head>
  <body>
    <div id="app" class="transition-ease">
      <div class="container">
        @yield('container')
      </div>
    </div>
  </body>
  <script src="{{asset('js/login.js')}}"></script>
</html>
