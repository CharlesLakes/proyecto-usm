@extends('page.default_form')

@section('title')
    Post
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
        <span class="font-italic" style="display: flex;"> 
            <div class="container-img-user mr-2">
                @if ($pregunta->user->image_user != '')
                    <img
                      src="{{Storage::get($pregunta->user->image_user)}}"
                      alt="Imagen de usuario"
                    />
                @else 
                    <img
                        src="https://www.softzone.es/app/uploads/2018/04/guest.png"
                        alt="Imagen de usuario"
                    />
                @endif
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
        <span class="font-italic d-flex"> 
                <div class="container-img-user mr-2">
                    @if ($comm->user->image_user != '')
                        <img
                          src="{{Storage::get($comm->user->image_user)}}"
                          alt="Imagen de usuario"
                        />
                    @else 
                        <img
                            src="https://www.softzone.es/app/uploads/2018/04/guest.png"
                            alt="Imagen de usuario"
                        />
                    @endif
                </div> 
            {{$comm->user->username}}
        </span>
        </div>
    </div>

    
@endforeach

<form method="post" action="{{ route('foroPost',['id' => $pregunta->id]) }}" class="m-4">
    @csrf
    <textarea name="contenido" class="from form-control mb-1" placeholder="Escribe un comentario..."></textarea>
    <button class="btn btn-primary">Comentar</button>
</form>

@endsection