<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <meta name="user_id" content="{{Auth::user()->id}}">
    <meta name="websocket_token" content="{{Auth::user()->websocket_token}}"> 
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
      integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
      integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" integrity="sha512-pDpLmYKym2pnF0DNYDKxRnOk1wkM9fISpSOjt8kWFKQeDmBTjSnBZhTd41tXwh8+bRMoSaFsRnznZUiH9i3pxA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js" integrity="sha512-+cXPhsJzyjNGFm5zE+KPEX4Vr/1AbqCUuzAS8Cy5AfLEWm9+UI9OySleqLiSQOQ5Oa2UrzaeAOijhvV/M4apyQ==" crossorigin="anonymous"></script>
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
    <style>
       body{
        font-size: 18px;
        min-height:100vh;
      }

      body *{
        background: 1rem;
      }
      .container-img-user{
        width:30px;
        height:30px;
        display:flex;
        justify-content: center;
        align-items:center;

        border-radius: 100%;
        overflow: hidden;

      }
      .container-img-user img{
        width:100%;
      }
      .shadow{
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
      }
     
      .content-post img{
        max-width:100%;
      }
    </style>
  </head>
  <body class="p-2">
    @yield('pre-main')
    <div class="container bg-white p-2 shadow rounded">
      @yield('main')
    </div>
    @yield('script')

    <script type="text/javascript">
      function procesamientoDeDiagonal() {
        var width = $(window).innerWidth();
        var height = $(window).innerHeight();
        var calculo = Math.atan(height / width);
        $("body").css({
            background: `linear-gradient(-${calculo}rad,#007AF9 0%,#007AF9 50%, white 50%,white 100%)`,
        });
    }
    $(document).ready(function(){
      procesamientoDeDiagonal();
    $(window).resize(procesamientoDeDiagonal);
    });


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

    $("#btn-comment").click(function(){
      ws_noti.send(JSON.stringify({
        title:document.title,
        id:parseInt(
          $("#content-user-info").data("user-id")
        )
      }))
    });

    </script>
  </body>
  
</html>