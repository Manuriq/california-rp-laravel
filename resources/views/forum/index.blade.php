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
                </ol>
            </div>
            @foreach ($categories as $categorie)
                
            <div class="mb-4">
                <!-- Card Header - Accordion -->
                <div class="d-block card-header py-3">
                  <h6 class="m-0 font-weight-bold text-special text-uppercase">{{ $categorie->title }}</h6>
                </div>
                <!-- Card Content - Collapse -->
                <div class="collapse show">
                    @foreach ($categorie->forums as $forum)
                    <div class="card-body border-bottom">
                        <div class="row align-items-center ml-4">
                            <div class="col-xl-5">
                                <a href="{{ route('f.show', $forum->id) }}" class="text-decoration-none"><h6 class="mb-0 font-weight-bold">{{ $forum->title }}</h6></a>
                                {{ $forum->desc }}
                            </div>
                            <div class="col-xl-2 text-center"><b>{{ $forum->countPost($forum->id) }}</b><br>Discussions</div>
                            @if ($forum->getLastPost($forum->id) != null)
                            <div class="col-xl-1 text-center">
                                <img class="img-profile rounded-circle" src="{{ asset('avatars/' . $forum->getLastPost($forum->id)->compte->cAvatarUrl) }}" width="50px" height="50px">
                            </div>
                            <div class="col-xl-3 text-center text-white">               
                                    <b>Sujet:</b> <a href="{{ route('p.show', [$forum->id, $forum->getLastPost($forum->id)]) }}">{{ $forum->getLastPost($forum->id)->title }}</a> <br>
                                    <b>Par: {{ $forum->getLastPost($forum->id)->compte->cNom }}</b><br>
                                    <b>Posté le:</b> {{ $forum->getLastPost($forum->id)->created_at->format('d/m/Y à H\hi') }}        
                            </div>
                            @else
                            <div class="col-xl-4 text-center text-white">               
                                Aucun sujet n'a été posté           
                            </div>
                            @endif
                        </div> 
                      </div> 
                    @endforeach
                </div>
              </div>
              @endforeach
          </section>
      </div>
  </div>
</div>
@endsection