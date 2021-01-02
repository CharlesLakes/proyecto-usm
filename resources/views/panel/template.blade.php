<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="user_id" content="{{Auth::user()->id}}">
    <meta name="websocket_token" content="{{Auth::user()->websocket_token}}"> 
    <title>Panel</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
      integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/w3-css/4.1.0/w3.css"
      integrity="sha512-Ef5r/bdKQ7JAmVBbTgivSgg3RM+SLRjwU0cAgySwTSv4+jYcVeDukMp+9lZGWT78T4vCUxgT3g+E8t7uabwRuw=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{asset("css/panel.css")}}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    @yield('head')
  </head>
  <body>
    <nav class="navegacion">
      <ul>
        <a href="{{route("panel")}}">
          <li>Inicio</li>
        </a>
        <a href="{{route("panelForo")}}">
          <li>Foro</li>
        </a>
        <a href="{{route("panelVideo")}}">
          <li>Videos</li>
        </a>
        <a href="{{route("panelQuiz")}}">
          <li>Quiz</li>
        </a>
      </ul>
      <div class="usuario">
        <div class="icono-usuario">
          <img
            src="{{ route("imageUser",['id' => Auth::user()->id]) }}"
            alt="Imagen de usuario"
            />
          
        </div>
        <span class="nombre-usuario">{{Auth::user()->username}}</span>
        <div class="menu-desplegable">
            <ul>
                <a style="text-decoration:none;" href="{{route('cambiarDatosUser')}}">
                    <li>Editar perfil</li>
                </a>
                <a style="text-decoration:none;" href="{{route('logout')}}">
                    <li>Cerrar sesión</li>
                </a>
            </ul>
        </div>
      </div>
    </nav>
    <main>
      @yield('main')
    </main>
    <script src="{{asset('js/panel.js')}}"></script>
  </body>
</html>