$(document).ready(function () {
    var preguntas = [{}];

    const actualizarPreguntas = function () {
        preguntas = [];

        for (let item of $("#contenedor-preguntas")[0].children) {
            console.log(
                $(item).children("ol").children("li").children(".questions")
            );
            preguntas.push({
                contenido: $(item).children(".contenido")[0].value,
                questions: $(item)
                    .children("ol")
                    .children("li")
                    .children(".questions")
                    .toArray()
                    .map((element) => element.value),
                correcta: $(item).children(".correcta")[0].value,
            });
        }
        console.log(preguntas);
    };

    const render = function () {
        $("#contenedor-preguntas").html("");
        var i = 0;
        for (let pregunta of preguntas) {
            let temp = $("#contenedor-preguntas").html();
            $("#contenedor-preguntas").html(
                temp +
                    `
          <div class="p-2 mb-2" style="box-sizing: border-box">
              <h2>Pregunta ${i + 1}</h2>
              <p>Pregunta:</p>
              <textarea
              class="form form-control contenido"
              name='questions[${i + 1}][contenido]'
              >${pregunta.contenido ? pregunta.contenido : ""}</textarea>
              <p>Respuestas:</p>
              <ol>
              <li>
                  <input
                  type="text"
                  name='questions[${i + 1}][respuestas][1]'
                  class="form form-control mb-2 questions"
                  value="${
                      pregunta.questions && pregunta.questions[0]
                          ? pregunta.questions[0]
                          : ""
                  }"
                  />
              </li>
              <li>
                  <input
                  type="text"
                  name='questions[${i + 1}][respuestas][2]'
                  class="form form-control mb-2 questions"
                  value="${
                      pregunta.questions && pregunta.questions[1]
                          ? pregunta.questions[1]
                          : ""
                  }"
                  />
              </li>
              <li>
                  <input
                  type="text"
                  name='questions[${i + 1}][respuestas][3]'
                  class="form form-control mb- questions"
                  value="${
                      pregunta.questions && pregunta.questions[2]
                          ? pregunta.questions[2]
                          : ""
                  }"
                  />
              </li>
              <li>
                  <input
                  type="text"
                  name='questions[${i + 1}][respuestas][4]'
                  class="form form-control mb-2 questions"
                  value="${
                      pregunta.questions && pregunta.questions[3]
                          ? pregunta.questions[3]
                          : ""
                  }"
                  />
              </li>
              </ol>
              <p>N° correcta:</p>
              <select name='questions[${
                  i + 1
              }][correcta]' class="form form-control correcta" value="${
                        pregunta.correcta ? pregunta.correcta : ""
                    }">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
              </select>
              <button
              class="btn btn-primary mt-2 quitar-pregunta"
              type="button"
              >
              Quitar pregunta
              </button>
          </div>
  
          `
            );

            i++;
        }

        $(".quitar-pregunta").click(function (e) {
            $(e.target).parent()[0].remove();
            actualizarPreguntas();
            render();
        });
    };
    render();

    $("#agregar-pregunta").click(function () {
        actualizarPreguntas();
        preguntas.push({});
        render();
    });
});
