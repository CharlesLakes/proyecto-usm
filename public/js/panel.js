toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: false,
    progressBar: false,
    positionClass: "toast-bottom-right",
    preventDuplicates: false,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

var ws_noti = new WebSocket("ws://localhost:6789/notificaciones");
ws_noti.onopen = function () {
    let user_id = $('meta[name="user_id"]').attr("content");
    let websocket_token = $('meta[name="websocket_token"]').attr("content");
    ws_noti.send(
        JSON.stringify({
            id: parseInt(user_id),
            token: websocket_token,
        })
    );
};

ws_noti.onmessage = function (event) {
    let data = JSON.parse(event.data);
    toastr.info(data.description, data.title);
};
