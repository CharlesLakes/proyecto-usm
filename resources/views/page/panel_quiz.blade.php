@extends('page.panel')

@section('main')
<a href="{{route('creatorQuiz')}}" class="add-quiz-or-video">
    <button>+</button>
  </a>

  <div class="container-horizontal-cards">
    @foreach ($asignaturas as $key => $item)
          @if (count($item) > 0)
          <h2>{{$key}}</h2>
          @endif

          @foreach ($item as $quiz)
          <a style="text-decoration:none;" target="_blank" href="/quiz/{{$quiz->id}}">
            <div class="horizontal-cards">
                <div class="container-img">
                  <img
                    src="{{$quiz->asignatura->image_url}}"
                  />
                </div>
            
                <div class="texto">
                  <h3>{{$quiz->title}}</h3>
                  <p>
                    {{$quiz->description}}
                  </p>
                  <div class="container-user">
                    <div class="icon">
                        @if ($quiz->user->image_user != '')
                        <img
                          src="{{Storage::get($quiz->user->image_user)}}"
                          alt="Imagen de usuario"
                        />
                        @else 
                        <img
                            src="https://www.softzone.es/app/uploads/2018/04/guest.png"
                            alt="Imagen de usuario"
                        />
                        @endif
                      </div>
                      <h5>{{$quiz->user->username}}</h5>
                  </div>
                </div>
              </div>
          </a>
          
          @endforeach
      @endforeach
  </div>
  
@endsection