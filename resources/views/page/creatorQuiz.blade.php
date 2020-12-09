<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear Quiz</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
      integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
      crossorigin="anonymous"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
      integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
      integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
      integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <h1>Creador de Quiz</h1>
      {!!$errors->first('title','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
      {!!$errors->first('description','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
      {!!$errors->first('questions.*.contenido','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
      {!!$errors->first('questions.*.respuestas','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
      {!!$errors->first('questions.*.correcta','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
      

      <form method="post" action="{{route('creatorQuiz')}}">
        @csrf
        <input
          type="text"
          placeholder="Titulo de el Quiz"
          class="form form-control mb-2"
          name="title"
        />
        <textarea
          name="description"
          placeholder="Descripción de Quiz"
          class="form form-control mb-2"
        ></textarea>
        <select name="asignatura_id" class="form form-control">
          <option value="1">MAT021</option>
        </select>
        <div id="contenedor-preguntas">
          <div class="p-2 mb-2" style="box-sizing: border-box">
            <h2>Pregunta 1</h2>
            <p>Pregunta:</p>
            <textarea
              class="form form-control"
              name='questions[1][contenido]'
            ></textarea>
            <p>Respuestas:</p>
            <ol>
              <li>
                <input
                  type="text"
                  name='questions[1]["respuestas"][1]'
                  class="form form-control mb-2"
                />
              </li>
              <li>
                <input
                  type="text"
                  name='questions[1]["respuestas"][2]'
                  class="form form-control mb-2"
                />
              </li>
              <li>
                <input
                  type="text"
                  name='questions[1]["respuestas"][3]'
                  class="form form-control mb-2"
                />
              </li>
              <li>
                <input
                  type="text"
                  name='questions[1]["respuestas"][4]'
                  class="form form-control mb-2"
                />
              </li>
            </ol>
            <p>N° correcta:</p>
            <select name='questions[1]["correcta"]' class="form form-control">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
            <button
              class="btn btn-primary mt-2"
              type="button"
              id="agregar-pregunta"
            >
              Quitar pregunta
            </button>
          </div>
        </div>

        <button class="btn btn-primary" type="button" id="agregar-pregunta">
          Agregar pregunta
        </button>
        <button class="btn btn-outline-primary" type="submit">
          Subir Quiz
        </button>
      </form>
    </div>
    <script src="{{asset('js/creatorQuiz.js')}}"></script>
  </body>
</html>
