@extends('page.default_form')

@section('title')
    {{$asignatura->sigla}}
@endsection

@section('pre-main')
<h1 class="container">{{$asignatura->nombre}}</h1>
@endsection

@section('main')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Creador</th>
      <th scope="col">Asunto</th>
      <th scope="col">Fecha</th>
      <th scope="col">Redirección</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($asignatura->post->reverse() as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td class="d-flex">
        <div class="container-img-user mr-2">
          <img
            src="{{ route("imageUser",['id' => $post->user->id]) }}"
            alt="Imagen de usuario"
          />
        </div> 
        {{$post->user->username}}
      </td>
      <td>{{$post->asunto}}</td>
      <td>{{$post->created_at}}</td>
      <td>
        <a href="{{route("foroPost",["id" => $post->id])}}"><button class="btn btn-primary">Ir</button></a>
        @if($post->user->id == Auth::user()->id || !Auth::user()->hasRole('user'))
          <a href="{{route("DeletePost",["id" => $post->id])}}"><button class="btn btn-danger">Eliminar</button></a>
        @endif
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
@endsection