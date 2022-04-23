@extends("layouts.dashboard")

@section("content")

<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
        <div class="card">
            <div class="card-body">
              <div class="user-profile">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="user-photo m-b-10">
                        <div class="image-upload">
                            <center>
                            @if (Auth::User()->id === $compte->id)
                                <form action="{{route('profile.update')}}" class="mb-2 d-flex flex-column align-items-center" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <label for="file-input">
                                        <img class="img-fluid" src="{{ asset('storage/' . $compte->cAvatarUrl) }}" width="150" height="150" alt="">
                                    </label>
                                    <input id="file-input" name="cAvatar" class="image-none" type="file" />
                                    <input class="btn btn-default" style="width: 150px;" type="submit" value="Changer d'Avatar">
                                </form>
                                <a class="btn btn-default" href="{{ route('profile.ip') }}" role="button">Valider Mon IP</a>
                            @else
                                <img class="img-fluid" src="{{ asset('storage/' . $compte->cAvatarUrl) }}" width="250" height="250" alt="">
                            @endif
                            </center>
                        </div>
                    </div>
                    <div class="user-skill mt-4">
                      <h4>Statistiques Compte</h4>
                      <ul>
                        <li>
                            <span class="badge bg-default mb-2"><strong>Inscription le:</strong> {{ $compte->created_at->translatedFormat('j F Y à h\hi') }}</span>
                        </li>
                        <li>
                            <span class="badge bg-default  mb-2">  
                            @if ($compte->cConnect != 0)
                            Connecté
                            @else
                                @if ($compte->cLastConnect == 0)
                                Déconnecté
                                @else
                                <strong>Dernière connexion le:</strong> {{ date('j F Y à h\hi', $compte->cLastConnect) }}
                                @endif
                            @endif
                            </span>     
                          </li>
                          <li>
                            <span class="badge bg-default mb-2"><strong>Sujets Crées:</strong> {{ $compte->countPost($compte->id) }}</span>
                          </li>
                          <li>
                            <span class="badge bg-default mb-2"><strong>Messages Crées:</strong> {{ $compte->countMessage($compte->id) }}</span>
                          </li>
                      </ul>
                    </div>
                    @if (Auth::User()->id === $compte->id)
                    <div class="user-skill mt-4">
                        <h4>Vos Informations</h4>
                        <ul>
                          <li>
                            <span class="badge bg-default mb-2"><strong>Votre IP:</strong> {{ $compte->cIp ? $compte->cIp : "Aucune IP enregistrée" }}</span>
                          </li>
                          <li>
                            <span class="badge bg-default mb-2"><strong>Votre Email:</strong> {{ $compte->cEmail }}</span>
                          </li>
                        </ul>
                      </div>
                      @endif
                  </div>
                  <div class="col-lg-8">
                    <div class="user-profile-name">{{ $compte->cNom }}</div>
                    <div class="user-job-title">{{ $compte->roleName() }}</div>
                    <div class="custom-tab user-profile-tab">
                        <ul class="nav nav-tabs mb-4" role="tablist">
                        <li role="presentation" class="active">
                            5 derniers Sujet Postés
                        </li>
                        </ul>
                        @foreach ($posts as $post)
                        <div class="mb-4">
                            <!-- Card Header - Accordion -->
                            <div class="d-block card-header"> 
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-10">
                                        <h6 class="m-0 text-white">
                                            <a href="{{ route('p.show', [$post->id]) }}"> {{ $post->title }}</a>
                                        </h6>
                                    </div>
                                    <div class="col-2 text-center">
                                            <small>{{ $post->updated_at->translatedFormat('j F Y à h\hi') }}</small>
                                    </div>
                                </div>  
                            </div>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show">
                                <div class="card-body border-forum">
                                    <div class="row align-items-center ml-4">
                                        <div class="col-12 text-white">
                                            {!! $post->content !!}
                                        </div>     
                                    </div> 
                                </div> 
                            </div>
                        </div>
                        @endforeach


                        <ul class="nav nav-tabs mb-4" role="tablist">
                        <li role="presentation" class="active">
                            5 derniers Messages Postés
                        </li>
                        </ul>
                        @foreach ($messages as $message)
                        <div class="mb-4">
                            <!-- Card Header - Accordion -->
                            <div class="d-block card-header"> 
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-10">
                                        <h6 class="m-0 text-white">
                                            Réponse: <a href="{{ route('p.show', [$message->post->id]) }}"> {{ $message->post->title }}</a>
                                        </h6>
                                    </div>
                                    <div class="col-2 text-center">
                                            <small>{{ $message->updated_at->translatedFormat('j F Y à h\hi') }}</small>
                                    </div>
                                </div>  
                            </div>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show">
                                <div class="card-body border-forum">
                                    <div class="row align-items-center ml-4">
                                        <div class="col-12 text-white">
                                            {!! $message->content !!}
                                        </div>     
                                    </div> 
                                </div> 
                            </div>
                        </div>
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection