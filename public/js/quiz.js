var preguntas = JSON.parse($("#contenedor_de_preguntas").text());
var respuestas = {};

function procesamientoDeDiagonal() {
    var width = $(window).innerWidth();
    var height = $(window).innerHeight();
    var calculo = Math.atan(height / width);
    $("body").css({
        background: `linear-gradient(-${calculo}rad,#007AF9 0%,#007AF9 50%, white 50%,white 100%)`,
    });
}

function navegadorDePreguntas(data) {
    for (let indice in data) {
        var temp = $("#number-quiz-container").html();
        $("#number-quiz-container").html(
            temp +
                `<button class="box-number-quiz" data-numero="${indice}">${indice}</button>`
        );
    }
}

function procesamientoDePreguntas(data, numero) {
    $("#btn-anterior").hide();
    $("#btn-siguiente").hide();

    for (let indice in data) {
        if (data[indice].numero == numero) {
            $("#text-quiz p").text(numero + ") " + data[indice].contenido);
            $("#option-container ul").html("");
            var a = 0;
            for (let respuesta in data[indice].respuestas) {
                var temp = $("#option-container ul").html();
                $("#option-container ul").html(
                    temp +
                        `
          <li class="option-quiz" data-option="${respuesta}">
            <input type="radio" ${
                indice in respuestas && a + 1 == respuestas[indice].value
                    ? "checked"
                    : ""
            }/>
            ${data[indice].respuestas[respuesta]}
          </li>
          `
                );
                a++;
            }

            MathJax.typeset();

            if (numero > 1) {
                $("#btn-anterior").show();
            }
            if (numero < Object.keys(data).length) {
                $("#btn-siguiente").html(
                    'Siguiente<i class="fas fa-arrow-right"></i'
                );
            } else {
                $("#btn-siguiente").text("Terminar");
            }
            $("#btn-siguiente").show();
            return;
        }
    }
}

function terminarIntento() {
    $.ajax({
        method: "post",
        url: window.location.href,
        data: {
            _token: $('meta[name="_token"]').attr("content"),
            respuestas: respuestas,
        },
        success: function (data) {
            swal({
                title: "Resultados:",
                text:
                    (data.puntos == data.totales ? "Felicitaciones !!!" : "") +
                    "\n" +
                    data.puntos +
                    "/" +
                    data.totales,
                button: "Volver al panel",
            }).then(function (value) {
                if (value) {
                    window.location.replace(window.location.origin + "/panel");
                }
            });
        },
        error: function () {
            alert("A ocurrido un error en enviar el quiz");
        },
    });
}

$(document).ready(function () {
    procesamientoDeDiagonal();
    $(window).resize(procesamientoDeDiagonal);
    $("#btn-show-quiz").click(function () {
        $(".menu-quiz-container").toggleClass("active");
        if ($(".menu-quiz-container").hasClass("active")) {
            $("#btn-show-quiz").text("Ocultar preguntas");
        } else {
            $("#btn-show-quiz").text("Mostrar preguntas");
        }
    });

    var numeroPregunta = 1;
    navegadorDePreguntas(preguntas);
    procesamientoDePreguntas(preguntas, numeroPregunta);

    var eventosRespuestas = function () {
        $("#option-container ul li").click(function (e) {
            for (let item of $("#option-container ul li")) {
                item.children[0].checked = false;
            }
            e.currentTarget.children[0].checked = true;

            respuestas[numeroPregunta] = {
                value: parseInt(e.currentTarget.dataset.option),
            };
            for (var element of $(".box-number-quiz")) {
                if (element.dataset.numero in respuestas) {
                    element.style = "color:white;background:#007af9;";
                }
            }
        });
    };
    eventosRespuestas();

    $("#btn-siguiente").click(function () {
        if (numeroPregunta == Object.keys(preguntas).length) {
            terminarIntento();
            return;
        }
        numeroPregunta++;
        procesamientoDePreguntas(preguntas, numeroPregunta);
        eventosRespuestas();
    });
    $("#btn-anterior").click(function () {
        numeroPregunta--;
        procesamientoDePreguntas(preguntas, numeroPregunta);
        eventosRespuestas();
    });
    $(".box-number-quiz").click(function (e) {
        numeroPregunta = e.target.dataset.numero;
        procesamientoDePreguntas(preguntas, numeroPregunta);
        eventosRespuestas();
    });
    $("#btn-terminar").click(function () {
        terminarIntento();
    });
});
