<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
          @if (Auth::user()->image_user != '')
          <img
            src="{{Storage::get(Auth::user()->image_user)}}"
            alt="Imagen de usuario"
          />
          @else
          <img
          src="https://www.softzone.es/app/uploads/2018/04/guest.png"
          alt="Imagen de usuario"
        />
          @endif
          
        </div>
        <span class="nombre-usuario">{{Auth::user()->username}}</span>
        <div class="menu-desplegable">
            <ul>
                <a href="{{route('cambiarDatosUser')}}">
                    <li>Editar perfil</li>
                </a>
                <a href="{{route('logout')}}">
                    <li>Cerrar sesión</li>
                </a>
            </ul>
        </div>
      </div>
    </nav>
    <main>
      @yield('main')
    </main>
    <script src="app.js"></script>
  </body>
</html>