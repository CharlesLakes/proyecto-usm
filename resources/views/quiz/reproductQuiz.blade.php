<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="id-quiz" content="{{$id}}">
    <meta name="_token" content="{{csrf_token()}}">
    <title>Quiz</title>
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
    <script>
      MathJax = {
        tex: {
          inlineMath: [
            ["$", "$"],
            ["\\(", "\\("],
          ],
        },
        options: {
          enableMenu: false,
        },
      };
    </script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/3.1.2/es5/tex-chtml.min.js"
      integrity="sha512-OEN4O//oR+jeez1OLySjg7HPftdoSaKHiWukJdbFJOfi2b7W0r0ppziSgVRVNaG37qS1f9SmttcutYgoJ6rwNQ=="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/5b04273445.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('css/quiz.css')}}" />
  </head>
  <body>
    <div id="app">
      <div class="quiz-container">
        <div class="text-quiz" id="text-quiz">
          <p></p>
        </div>
        <div class="option-container" id="option-container">
          <ul></ul>
        </div>
      </div>
    </div>
    <div class="menu-quiz-container">
      <button id="btn-show-quiz">Mostrar preguntas</button>
      <div class="number-quiz-container" id="number-quiz-container"></div>
      <div class="btn-end-container">
        <button>Terminar intento</button>
      </div>
    </div>
    <div id="btn-anterior" class="btn-control">
      <i class="fas fa-arrow-left"></i> Anterior
    </div>
    <div id="btn-siguiente" class="btn-control">
      Siguiente<i class="fas fa-arrow-right"></i>
    </div>
    <div id="contenedor_de_preguntas" hidden>
        {{json_encode($json_quiz)}}
    </div>
    <script src="{{asset('js/quiz.js')}}"></script>
  </body>
</html>