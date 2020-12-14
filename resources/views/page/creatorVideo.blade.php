@extends('page.default_form')

@section('title')
    Creador de video
@endsection

@section('main')
<h1>Creador de Videos</h1>
<form action="{{ route('creatorVideo') }}" method="post">
  @csrf
  <input
    type="text"
    name="title"
    class="form form-control mb-2"
    placeholder="Ingresa el titulo"
  />
  <textarea
    name="description"
    class="form form-control mb-2"
    placeholder="Ingresa la descipción"
  ></textarea>
  <input
    type="url"
    name="link"
    class="form form-control mb-2"
    placeholder="Ingresa el link de youtube"
    class="mb-2"
  />
  <select name="asignatura_id" class="form form-control mb-2">
    @foreach (Auth::user()->asignaturas as $asignatura)
    <option value="{{$asignatura->id}}">{{$asignatura->sigla}}</option>
        
    @endforeach
  </select>
  <button class="btn btn-primary">Publicar video</button>
</form>
@endsection