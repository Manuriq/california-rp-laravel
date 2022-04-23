@extends("layouts.dashboard")

@section("content")

<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <!-- /# row -->
          <section id="main-content">
            <div class="page-title mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('categorie.index') }}">Accueil</a></li>
                    <li class="breadcrumb-item">{{ $forum->title }}</li>
                </ol>
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    @if ($forum->state === 0)
                        <a class="btn btn-default" href="{{ route('p.create', $forum->id) }}" role="button">Créer un Sujet</a>
                    @endif      
                    {{ $posts->links() }}
                </div>
            </div>
            <div class="mb-4">
                <!-- Card Header - Accordion -->
                <div class="d-block card-header py-3">
                  <h6 class="m-0 font-weight-bold text-special text-uppercase">{{ $forum->title }}</h6>
                </div>
                <!-- Card Content - Collapse -->
                <div class="collapse show">
                    @foreach ($posts as $post)
                    <div class="card-body border-forum">
                        <div class="row align-items-center ml-4">
                            <div class="col-xl-5">
                                <a href="{{ route('p.show', [$post->id]) }}" class="text-decoration-none"><h6 class="mb-0 font-weight-bold">{{ $post->title }}</h6></a>
                            </div>
                            <div class="col-xl-2 text-center"><b>{{ $post->countMessage($post->id)+1 }}</b><br>Messages</div>
                            <div class="col-xl-1 text-center">
                                <a href="{{ route('profile.show', $post->compte->id) }}">
                                    <img class="img-profile rounded-circle" src="{{ asset('storage/' . $post->compte->cAvatarUrl) }}" width="50px" height="50px">
                                </a>
                            </div>
                            <div class="col-xl-3 text-center text-white">
                                <b>Sujet:</b> <a href="{{ route('p.show', [$post->id]) }}">{{ $post->title }}</a><br>
                                <b>Par:</b> <a href="{{ route('profile.show', $post->compte->id) }}">{{ $post->compte->cNom }}</a><br>
                                <b>Posté le:</b> {{ $post->created_at->translatedFormat('j F Y à h\hi') }}
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
</div>
@endsection