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
                    <li class="breadcrumb-item"><a href="{{ route('f.show', $post->forum->id) }}">{{ $post->forum->title }}</a></li>
                    <li class="breadcrumb-item">{{ $post->title }}</a>
                </ol>
            </div>
            <div class="mb-4">
                <!-- Card Header - Accordion -->
                <div class="d-block card-header"> 
                    <div class="row align-items-center justify-content-between">
                        <div class="col-10">
                            <h6 class="m-0 text-white">
                                Sujet: {{ $post->title }}
                            </h6>
                        </div>
                        <div class="col-2 text-center">
                            <a class="inbox-avatar" href="{{ route('profile.show', $post->compte->id) }}">
                                <img class="img-profile rounded-circle ml-2" src="{{ asset('storage/' . $post->compte->cAvatarUrl) }}" width="55px" height="55px">
                            </a>
                            <div>
                                <small>(Par: <a class="" href="{{ route('profile.show', $post->compte->id) }}">{{ $post->compte->cNom }}</a> le {{ $post->updated_at->translatedFormat('j F Y à h\hi') }})</small>
                            </div>
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
            <div class="mb-4">
                <div class="d-flex justify-content-end">
                    {{ $messages->links() }}
                </div>        
            </div>
            @foreach ($messages as $message)
            <div class="mb-4">
                <!-- Card Header - Accordion -->
                <div class="d-block card-header"> 
                    <div class="row align-items-center justify-content-between">
                        <div class="col-10">
                            <h6 class="m-0 text-white">
                                Réponse: {{ $post->title }}
                            </h6>
                        </div>
                        <div class="col-2 text-center">
                            <a class="inbox-avatar" href="">
                                <img class="img-profile rounded-circle ml-2" src="{{ asset('storage/' . $message->compte->cAvatarUrl) }}" width="55px" height="55px">
                            </a>
                            <div>
                                <small>(Par: {{ $message->compte->cNom }} à {{ $message->updated_at->translatedFormat('j F Y à h\hi') }})</small>
                            </div>
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
            <div class="mb-4">
                <div class="d-flex justify-content-end">
                    {{ $messages->links() }}
                </div>        
            </div>
            <div class="mb-4">
                <!-- Card Header - Accordion -->
                <div class="d-block card-header py-3"> 
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h6 class="m-0 text-white">
                                Réponse: {{ $post->title }}
                            </h6>
                        </div>
                    </div>  
                </div>
                <!-- Card Content - Collapse -->
                <div class="collapse show">
                    <div class="card-body border-bottom">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <form action="{{ route('m.store', $post->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <textarea id="editor" class="ckeditor form-control" name="content" required>{{ old('content') }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default">Envoyer</button>
                                </form>
                            </div>     
                        </div> 
                      </div> 
                </div>
            </div>
          </section>
      </div>
  </div>
</div>
@endsection