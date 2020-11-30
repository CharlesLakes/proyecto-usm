function procesamientoDeDiagonal() {
    var width = $(window).innerWidth();
    var height = $(window).innerHeight();
    var calculo = Math.atan(height / width);
    $("body").css({
        background: `linear-gradient(-${calculo}rad,#007AF9 0%,#007AF9 50%, white 50%,white 100%)`,
    });
}

$(document).ready(function () {
    procesamientoDeDiagonal();
    $("#image-user-upload").change(function (e) {
        var f = e.target.files[0];
        var reader = new FileReader();
        $("#image-edit").attr("src", "");
        $(".crop-image").addClass("active");

        reader.onloadend = function (a) {
            console.log(reader.result);
            $("#image-edit").attr("src", reader.result);
            $("#image-edit").cropper({
                preview: ".preview",
                aspectRatio: 1 / 1,
            });
        };
        reader.readAsDataURL(f);
    });

    $("#save-img").click(function () {
        var canvas = $("#image-edit").cropper("getCroppedCanvas");
        canvas.toBlob(function (blob) {
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var data = reader.result;
                $("#image-user").attr("src", data);
                $("#imageUser").val(data.split(","));
                $(".crop-image").removeClass("active");

                $("#image-edit").cropper("destroy");
            };
        });
    });
});
