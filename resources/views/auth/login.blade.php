@extends('auth.template')

@section('container')
<div class="container-form">
    <h1>Inicia sesión o registrate.</h1>
    <form action="/login" method="post">
      {!!$errors->first('msg','<span class="alert">:message</span>') !!}
      @csrf
      <div class="container-input">
        <i class="fas fa-envelope transition-ease  form-icon"></i>
        <label class="transition-ease " for="email"></i> Email USM</label>
        <input id="email" name="email" class="transition-ease " type="email" required/>
      </div>
      <div class="container-input">
        <i class="fas fa-key transition-ease form-icon"></i>
        <label class="transition-ease " for="pass"></i> Contraseña</label>
        <input id="pass" name="password" class="transition-ease form-enter" type="password" required/>
      </div>
    </form>
    <div class="container-button">
      <a href="{{route('register')}}">
        <button class="change-url transition-ease">Registrarte</button>
      </a>
      <button id="btn-input" class="transition-ease" type="sumbit">Ingresar</button>
    </div>
  </div>
  <div class="container-image">
    <img src="{{asset('images/intro.jpg')}}" alt="">
  </div>
@endsection