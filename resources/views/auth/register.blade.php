@extends('auth.template')

@section('container')
<div class="container-image">
    <img src="{{asset('images/intro.jpg')}}" alt="">
</div>
<div class="container-form">
    <h1>Inicia sesión o registrate.</h1>
    <form action="/register" method="post">
      {!!$errors->first('msg','<span class="alert">:message</span>') !!}
      {!!$errors->first('username','<span class="alert">:message</span>') !!}
      {!!$errors->first('email','<span class="alert">:message</span>') !!}
      {!!$errors->first('password','<span class="alert">:message</span>') !!}
      {!!$errors->first('re_password','<span class="alert">:message</span>') !!}
      @csrf
      <div class="container-input">
        <i class="fas fa-user transition-ease  form-icon"></i>
        <label class="transition-ease " for="username">Nombre de Usuario</label>
        <input id="username" name="username" class="transition-ease " type="email" required/>
      </div>
      <div class="container-input">
        <i class="fas fa-envelope transition-ease  form-icon"></i>
        <label class="transition-ease " for="email">Email USM</label>
        <input id="email" name="email"  class="transition-ease " type="email" required/>
      </div>
      <div class="container-input">
        <i class="fas fa-key transition-ease form-icon"></i>
        <label class="transition-ease " for="pass">Contraseña</label>
        <input id="pass"  name="password" class="transition-ease " type="password" required/>
      </div>
      <div class="container-input">
        <i class="fas fa-key transition-ease form-icon"></i>
        <label class="transition-ease " for="re-pass">Repite la contraseña</label>
        <input id="re-pass" name="re_password" class="transition-ease form-enter" type="password" required/>
      </div>
    </form>
    <div class="container-button">
      <a href="{{route('login')}}">
        <button class="change-url transition-ease">Iniciar sesión</button>
      </a>
      <button id="btn-input" class="transition-ease" type="submit">Registrarte</button>
    </div>
</div>
   
@endsection