var asignaturas = [];

var asignaturas_selecionadas = [];

function procesamientoDeDiagonal() {
    var width = $(window).innerWidth();
    var height = $(window).innerHeight();
    var calculo = Math.atan(height / width);
    $("body").css({
        background: `linear-gradient(-${calculo}rad,#007AF9 0%,#007AF9 50%, white 50%,white 100%)`,
    });
}

function procesamientoDeAsignaturas() {
    $("#asignaturas").html("");
    $("#asignaturas_inscirtas").html("");

    for (const asignatura of asignaturas_selecionadas) {
        let contenido = $("#asignaturas_inscirtas").html();
        $("#asignaturas_inscirtas").html(
            contenido +
                `
    <div class="asig-container">
      <span>${asignatura.sigla}</span><button class="btn btn-primary" onclick="procesamientoDeDesinscripcion(${asignatura.id},'${asignatura.sigla}')">Eliminar</button>
    </div>
    `
        );
    }

    for (const asignatura of asignaturas) {
        let contenido = $("#asignaturas").html();
        let search = $("#filtrador").val();
        if (
            search == "" ||
            asignatura.sigla.toLowerCase().indexOf(search.toLowerCase()) != -1
        ) {
            $("#asignaturas").html(
                contenido +
                    `
      <div class="asig-container">
        <span>${asignatura.sigla}</span><button class="btn btn-primary" onclick="procesamientoDeInscripcion(${asignatura.id},'${asignatura.sigla}')">Añadir</button>
      </div>
    `
            );
        }
    }
}

function procesamientoDeDesinscripcion(input_id, input_sigla) {
    asignaturas_selecionadas = asignaturas_selecionadas.filter(function (
        value,
        index,
        arr
    ) {
        return value.id != input_id;
    });
    asignaturas.push({
        id: input_id,
        sigla: input_sigla,
    });
    procesamientoDeAsignaturas();
}

function procesamientoDeInscripcion(input_id, input_sigla) {
    asignaturas = asignaturas.filter(function (value, index, arr) {
        return value.id != input_id;
    });
    asignaturas_selecionadas.push({
        id: input_id,
        sigla: input_sigla,
    });
    procesamientoDeAsignaturas();
}

$(document).ready(function () {
    procesamientoDeDiagonal();
    $(window).resize(procesamientoDeDiagonal);

    $.getJSON("/asignatura/lista", function (resp) {
        asignaturas = resp;
        procesamientoDeAsignaturas();
    });
    $("#filtrador").on("keyup", procesamientoDeAsignaturas);

    $("#btn-sig").click(function () {
        let token = $('meta[name="csrf_token"]').attr("content");

        $.ajax({
            method: "post",
            url: "/asignatura/inscripcion",
            data: {
                _token: token,
                listaAsignatura: asignaturas_selecionadas,
            },
            success: function (resp) {
                location.href = "/";
            },
            error: function () {
                alert("Ocurrio un error");
            },
        });
    });
});
