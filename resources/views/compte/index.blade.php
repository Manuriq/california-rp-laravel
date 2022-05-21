@extends("layouts.dashboard")

@section("content")

<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <!-- /# row -->
          <section id="main-content">
            <div class="page-title mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Accueil</li>
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
                    @foreach ($forums as $forum)
                    @if ($forum->categorie->id == $categorie->id)            
                        <div class="card-body border-forum">
                            <div class="row align-items-center ml-4">
                                <div class="col-xl-5">
                                    <a href="{{ route('f.show', $forum->id) }}" class="text-decoration-none"><h6 class="mb-0 font-weight-bold">{{ $forum->title }}</h6></a>
                                    {!! $forum->desc !!}
                                </div>
                                <div class="col-xl-2 text-center"><b>{{ $forum->countPost($forum->id) }}</b><br>Discussions</div>
                                @if ($forum->getLastPost($forum->id) != null)
                                <div class="col-xl-1 text-center">
                                    <a href="{{ route('profile.show', $forum->getLastPost($forum->id)->compte->id) }}">
                                        <img class="img-profile rounded-circle" src="{{ asset('storage/' . $forum->getLastPost($forum->id)->compte->cAvatarUrl) }}" width="50px" height="50px">
                                    </a>
                                </div>
                                <div class="col-xl-3 text-center text-white">               
                                        <b>Sujet:</b> <a href="{{ route('p.show', [$forum->getLastPost($forum->id)]) }}">{{ $forum->getLastPost($forum->id)->title }}</a> <br>
                                        <b>Par:</b> <a href="{{ route('profile.show', $forum->getLastPost($forum->id)->compte->id) }}">{{ $forum->getLastPost($forum->id)->compte->cNom }}</a><br>
                                        <b>Posté le:</b> {{ $forum->getLastPost($forum->id)->created_at->translatedFormat('j F Y à h\hi') }}   
                                </div>
                                @else
                                <div class="col-xl-4 text-center text-white">               
                                    Aucun sujet n'a été posté           
                                </div>
                                @endif
                            </div> 
                        </div> 
                      @endif
                    @endforeach
                </div>
            </div>
              @endforeach
          </section>
      </div>
  </div>
</div>
@endsection