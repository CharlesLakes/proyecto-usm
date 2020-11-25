<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienvenido a PEPFI</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
      integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
      crossorigin="anonymous"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
      integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('css/bienvenida.css')}}" />
  </head>
  <body>
    <header>
      <h1 class="titulo">PEPFI</h1>
      <a href="{{route('login')}}">
        <button class="btn">Ingresar</button>
      </a>
    </header>
    <main>
      <div class="portada">
        <img src="{{asset('images/portada.jpeg')}}" alt="Imagen de portada" />
        <p>
          En este sitio web los alumnos podran ayudarse y compartir lo
          aprendido.
        </p>
      </div>
      <div class="container">
        <div class="container-info">
          <div class="container-img">
            <img src="{{asset('images/yt1.jpeg')}}" alt="Imagen de acompañamiento" />
          </div>
          <div>
            <span
              >Cada alumno puede contribuir subiendo información o videos sobre
              ramos en los que se especialice o tenga conocimiento
              suficiente.</span
            >
          </div>
        </div>
      </div>
      <div class="container-dev">
        <div class="container-dev-info">
          <div class="card-dev">
            <div class="container-img">
              <a href="https://github.com/CharlesLakes" target="_blank"></a>
              <img
                src="https://avatars2.githubusercontent.com/u/46362356"
                alt="Desarrollador"
              />
            </div>
            <div class="texto">
              <h3>Carlos Lagos</h3>

              <p>Desarrollador de frontend y backend</p>
            </div>
          </div>
          <div class="card-dev">
            <div class="container-img">
              <a href="https://github.com/Jigsaw123ixas2" target="_blank"></a>
              <img
                src="https://avatars0.githubusercontent.com/u/74024981"
                alt="Desarrollador"
              />
            </div>
            <div class="texto">
              <h3>Vicente Muños</h3>

              <p>Desarrollador de backend</p>
            </div>
          </div>
          <div class="card-dev">
            <div class="container-img">
              <a href="https://github.com/VicariousMoth" target="_blank"></a>
              <img
                src="https://avatars0.githubusercontent.com/u/68717483"
                alt="Desarrollador"
              />
            </div>
            <div class="texto">
              <h3>Reinaldo Ramirez</h3>

              <p>Desarrollador de frontend y diseño web</p>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="{{asset('js/bienvenida.js')}}"></script>
  </body>
</html>
