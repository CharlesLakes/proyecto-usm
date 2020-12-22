<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.4/sweetalert2.min.js"
      integrity="sha512-EPNolNCOFmcnNzDqK7E4Wdwo9KBt/HCP/J8bmK6uSik6YsoLU1b8XGbg5hpw2BY+IilYjf1ce5t7rCuHB60mzA=="
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.4/sweetalert2.css"
      integrity="sha512-i++eR2u4MtevO3tOPI55hNUccQVQ0+hf9cpevM2q/GmdM+UZMtzHn5pSxFmVuUK1kikm5qUiZB1ef6rWqLXb3Q=="
      crossorigin="anonymous"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
      integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
      integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
      crossorigin="anonymous"
    />
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
      integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.js"
      integrity="sha512-E+gDQcIvNXE60SjCS38ysf1mGh4ObBpKcUOp0oEaHQHQAdaN2p7GelOpgEdpTuCLoIJyLkNXiqFZbyD9Ak/Ygw=="
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.css"
      integrity="sha512-vmXqikRa5kmI3gOQygzml5nV+5NGxG8rt8KWHKj8JYYK12JUl2L8RBfWinFGTzvpwwsIRcINy9mhLyodnmzjig=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{asset('css/changeDataUser.css')}}" />
  </head>
  <body>
    <div id="app">
      <h1 style="margin: 0; margin-bottom: 20px; color: #007af9; padding: 0">
        Edita tu perfil
      </h1>
      <div class="image-user">
        <input type="file" id="image-user-upload" />
        <img
          src="{{ route("imageUser",['id' => Auth::user()->id]) }}"
          alt="Imagen de usuario"
          id="image-user"
        >
        
      </div>
      <div class="container-input">
        <form action="" method="POST">
          @csrf
          {!!$errors->first('imageUser','<span class="alert alert-danger">:message</span>') !!}
          {!!$errors->first('newPassword','<span class="alert alert-danger">:message</span>') !!}
          {!!$errors->first('msg','<span class="alert alert-danger">:message</span>') !!}
          <input type="hidden" id="imageUser" name="imageUser" />
          <input
            type="text"
            class="form form-control"
            placeholder="Nombre de usuario "
            name="newUsername"
          />
          <input
            type="password"
            class="form form-control"
            placeholder="Ingresa la contrasela actual (obligatorio)"
            name="password"
            required
          />
          <input
            type="password"
            class="form form-control"
            placeholder="Ingresa la nueva contraseña"
            name="newPassword"
          />
          <input
            type="password"
            class="form form-control"
            placeholder="Ingresa la nueva contraseña"
            name="reNewPassword"
          />
          <button class="btn btn-primary" id="editar-perfil">
            Editar Perfil
          </button>
        </form>
      </div>
    </div>
    <div class="crop-image">
      <div class="preview" style="width: 100px; height: 100px"></div>
      <div>
        <img src="" id="image-edit" />
      </div>
      <button class="btn btn-primary" style="margin-top: 10px" id="save-img">
        Guardar
      </button>
    </div>
    <script src="{{asset('js/changeDataUser.js')}}"></script>
  </body>
</html>