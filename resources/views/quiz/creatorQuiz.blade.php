@extends('page.default_form')

@section('title')
    Creador de quiz
@endsection

@section('pre-main')
<h1 class="container">Creador de Quiz</h1>
@endsection

@section('main')
{!!$errors->first('title','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
{!!$errors->first('description','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
{!!$errors->first('questions.*.contenido','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
{!!$errors->first('questions.*.respuestas','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
{!!$errors->first('questions.*.correcta','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
{!!$errors->first('msg','<span class="alert">:message</span>') !!}


<form method="post" action="{{route('creatorQuiz')}}">
  @csrf
  <input
    type="text"
    placeholder="Titulo de el Quiz"
    class="form form-control mb-2"
    name="title"
  />
  <textarea
    name="description"
    placeholder="Descripción de Quiz"
    class="form form-control mb-2"
  ></textarea>
  <select name="asignatura_id" class="form form-control">
    @foreach (Auth::user()->asignaturas as $asignatura)
      <option value="{{$asignatura->id}}">{{$asignatura->sigla}}</option>
    @endforeach
  </select>
  <div id="contenedor-preguntas">

  </div>

  <button class="btn btn-primary" type="button" id="agregar-pregunta">
    Agregar pregunta
  </button>
  <button class="btn btn-outline-primary" type="submit">
    Publicar quiz
  </button>
</form>
@endsection

@section('script')
<script src="{{asset('js/creatorQuiz.js')}}"></script>
@endsection