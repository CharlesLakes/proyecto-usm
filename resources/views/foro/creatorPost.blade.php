@extends('page.default_form')

@section('title')
    Creador de post
@endsection

@section('pre-main')
<h1 class="container">Creador de Post</h1>
@endsection

@section('main')
    <form action="{{route('creatorPost')}}" method="post">
      @csrf
        <input
        type="text"
        name="asunto"
        class="form form-control mb-2"
        placeholder="Asunto:"
        />
        <select class="form form-control mb-2" name="asignatura_id">
            @foreach (Auth::user()->asignaturas as $asignatura)
            <option value="{{$asignatura->id}}">{{$asignatura->sigla}}</option> 
            @endforeach
            
        </select>
        <textarea name="contenido" id="contenido"></textarea>
        <button class="btn btn-primary mt-5">Publicar</button>
    </form>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
      $("#contenido").summernote({
        height: 200,
        placeholder: "Contenido:",
      });
    });
  </script>
@endsection