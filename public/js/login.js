function procesamientoDeDiagonal() {
    var width = $(window).innerWidth();
    var height = $(window).innerHeight();
    var calculo = Math.atan(height / width);
    $("#app").css({
        background: `linear-gradient(-${calculo}rad,#007AF9 0%,#007AF9 50%, white 50%,white 100%)`,
    });
}

function comprobarInput() {
    var flag = true;
    $.each($(".container-input input"), function (index, item) {
        if ($(item).val() === "") {
            flag = false;
        }
    });
    if (!flag) {
        alert("Rellena todos los campos.");
    }
    return flag;
}

$(document).ready(function () {
    $(window).on("load", procesamientoDeDiagonal);
    $(window).on("resize", procesamientoDeDiagonal);
    if (
        (!$(window).innerWidth() < $(window).innerHeight() &&
            $(window).innerWidth() < 600) ||
        (!$(window).innerHeight() < $(window).innerWidth() &&
            $(window).innerHeight() < 600)
    ) {
        $("#app").css({
            height:
                String(
                    $(window).innerHeight() > $(window).innerWidth()
                        ? $(window).innerHeight()
                        : $(window).innerWidth()
                ) + "px",
        });
    }

    if ($("#app .container-form form").children().length <= 3) {
        $("#app .container").css({
            height: "500px",
        });
    }
    console.log();

    $.each($(".container-input input"), function (index, item) {
        if ($(item).val() !== "") {
            $(item).parent().addClass("active");
        }
    });

    $(".container-input input").focus(function () {
        $(this).parent().addClass("active");
    });
    $(".container-input input").blur(function () {
        if ($(this).val() === "") {
            $(this).parent().removeClass("active");
        }
    });

    $(".form-enter").keypress(function (e) {
        if (e.keyCode === 13 && comprobarInput()) {
            $(".container-form form").submit();
        }
    });
    $("#btn-input").click(function () {
        if (comprobarInput()) {
            $(".container-form form").submit();
        }
    });
});
