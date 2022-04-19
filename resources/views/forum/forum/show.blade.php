@extends("layouts.dashboard")

@section("content")

<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <!-- /# row -->
          <section id="main-content">
            <div class="page-title mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('forum.index') }}">Accueil</a></li>
                    <li class="breadcrumb-item">{{ $forum->title }}</li>
                </ol>
            </div>
            <a class="btn btn-default mb-2" href="{{ route('p.create', $forum->id) }}" role="button">Créer un Sujet</a>
            <div class="mb-4">
                <!-- Card Header - Accordion -->
                <div class="d-block card-header py-3">
                  <h6 class="m-0 font-weight-bold text-special text-uppercase">{{ $forum->title }}</h6>
                </div>
                <!-- Card Content - Collapse -->
                <div class="collapse show">
                    @foreach ($forum->posts as $post)
                    <div class="card-body border-bottom">
                        <div class="row align-items-center ml-4">
                            <div class="col-xl-5">
                                <a href="{{ route('p.show', [$post->forum->id,$post->id]) }}" class="text-decoration-none"><h6 class="mb-0 font-weight-bold">{{ $post->title }}</h6></a>
                            </div>
                            <div class="col-xl-2 text-center"><b>3</b><br>Messages</div>
                            <div class="col-xl-1 text-center"><img class="img-profile rounded-circle" src="{{ asset('avatars/' . $post->compte->cAvatarUrl) }}" width="50px" height="50px"></div>
                            <div class="col-xl-3 text-center text-white">
                                <b>Sujet:</b> <a href="{{ route('p.show', [$post->forum->id,$post->id]) }}">{{ $post->title }}</a><br>
                                <b>Par:</b> {{ $post->compte->cNom }}<br>
                                <b>Posté le:</b> {{ $post->created_at->format('d/m/Y à H\hi') }}
                            </div>
                        </div> 
                      </div> 
                    @endforeach
                </div>
              </div>
          </section>
      </div>
  </div>
</div>
@endsection