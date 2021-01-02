@extends('page.default_form')

@section('title')
    Post #{{$pregunta->id}}
@endsection

@section('main')
<div class="card mb-2">
    <div class="card-header">
        <b>Asunto:</b> {{$pregunta->asunto}}
    </div>
    <div class="card-body d-flex flex-column">
        <div class="mb-1 content-post">
            {!!
               $pregunta->contenido    
            !!}
        </div>
        <span class="font-italic" style="display: flex;" id="content-user-info" data-user-id="{{$pregunta->user->id}}"> 
            <div class="container-img-user mr-2">
                <img
                      src="{{ route("imageUser",['id' => $pregunta->user->id]) }}"
                      alt="Imagen de usuario"
                    />
            </div> 
        {{$pregunta->user->username}}
        </span>
    </div>
</div>
<b class="m-2">Comentarios: </b>


@foreach ($pregunta->comment as $comm)

    <div class="card m-2">
        <div class="card-body d-flex flex-column">
            <div class="mb-3">
                {{ $comm->contenido }}
            </div>
            <div style="display: flex;justify-content:space-between;">
                <span class="font-italic d-flex"> 
                        <div class="container-img-user mr-2">
                            <img
                            src="{{ route("imageUser",['id' => $comm->user->id]) }}"
                            alt="Imagen de usuario"
                            />
                        </div> 
                    {{$comm->user->username}}
                </span>
                @if(Auth::user()->id == $comm->user->id || !Auth::user()->hasRole('user'))
                <a href="{{route("DeleteComment",['id' => $comm->id])}}">
                    <button class="btn btn-danger">Eliminar</button>
                </a>
                @endif
            </div>
        </div>
    </div>

    
@endforeach

<form method="post" action="{{ route('foroPost',['id' => $pregunta->id]) }}" class="m-4">
    @csrf
    <textarea name="contenido" class="from form-control mb-1" placeholder="Escribe un comentario..."></textarea>
    <button class="btn btn-primary" id="btn-comment">Comentar</button>
</form>

@endsection