function processHeader() {
    if ($(window).scrollTop() > 0) {
        $("header").addClass("active");
    } else {
        $("header").removeClass("active");
    }
}
function processImgDev() {
    for (const element in $(".card-dev .container-img").get()) {
        $($(".card-dev .container-img").get(element)).css({
            height: $($(".card-dev .container-img").get(element)).width(),
        });
    }
}
$(document).ready(function () {
    processHeader();
    processImgDev();

    $(window).scroll(processHeader);
    $(window).resize(processImgDev);
});
