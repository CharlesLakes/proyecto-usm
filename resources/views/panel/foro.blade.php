@extends('panel.template')

@section('head')
<link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
@endsection

@section('main')
<a href="{{route('creatorPost')}}" class="add-quiz-or-video">
  <button>+</button>
</a>

<table class="table mt-2 shadow rounded container">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Tema</th>
        <th scope="col">Redirección</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($asignaturas as $item)
      <tr>
        <td>{{$item->nombre}}</td>
        <td><a  target="_blank" href="{{route('foroTema',["id" => $item->id])}}"><button class="btn btn-primary">Ir</button></a></td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
@endsection