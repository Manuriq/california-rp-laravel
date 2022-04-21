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
                    <li class="breadcrumb-item"><a href="{{ route('f.show', $post->forum->id) }}">{{ $post->forum->title }}</a></li>
                    <li class="breadcrumb-item">{{ $post->title }}</a>
                </ol>
            </div>
            <div class="mb-2 block-message">
                <div class="row">
                    <div class="avatar-message d-flex flex-column align-items-center">
                        <span class="text-uppercase"><a class="" href="{{ route('profile.show', $post->compte->id) }}">{{ $post->compte->cNom }}</a></span>
                        <a class="" href="{{ route('profile.show', $post->compte->id) }}">
                            <img class="rounded-circle avatar-img-message" src="{{ asset('storage/' . $post->compte->cAvatarUrl) }}">
                        </a>
                        <span class="badge bg-default mb-2">Crée le: {{  $post->compte->created_at->translatedFormat('j F Y à h\hi') }}</span>
                        <span class="badge bg-default mb-2">Posts: {{ $post->compte->countPost($post->compte->id) }}</span>
                        <span class="badge bg-default mb-2">Sujets: {{ $post->compte->countMessage($post->compte->id) }}</span>
                    </div>
                    <div class="content-message">
                        <small>{{ $post->created_at->translatedFormat('j F Y à h\hi') }}</small>
                        <div class="p-4">
                            {!! $post->content !!}
                        </div>  
                    </div>
                </div>
            </div>
            <div class="mb-4 d-flex flex-row-reverse">
                {{ $messages->links() }}
                <a class="btn btn-default mr-1" href="{{ route('post.edit', $post->id) }}" role="button">Editer</a>
                <a class="btn btn-default mr-1" href="{{ route('post.destroy', $post->id) }}" role="button">Supprimer</a>
            </div>
            @foreach ($messages as $message)
            <div class="mb-2 block-message">
                <div class="row">
                    <div class="avatar-message d-flex flex-column align-items-center">
                        <span class="text-uppercase"><a class="" href="{{ route('profile.show', $message->compte->id) }}">{{ $message->compte->cNom }}</a></span>
                        <a class="" href="{{ route('profile.show', $message->compte->id) }}">
                            <img class="rounded-circle avatar-img-message" src="{{ asset('storage/' . $message->compte->cAvatarUrl) }}">
                        </a>
                        <span class="badge bg-default mb-2">Crée le: {{  $message->compte->created_at->translatedFormat('j F Y à h\hi') }}</span>
                        <span class="badge bg-default mb-2">Posts: {{ $message->compte->countPost($message->compte->id) }}</span>
                        <span class="badge bg-default mb-2">Sujets: {{ $message->compte->countMessage($message->compte->id) }}</span>
                    </div>
                    <div class="content-message">
                        <small>{{ $message->created_at->translatedFormat('j F Y à h\hi') }}</small>
                        <div class="p-4">
                            {!! $message->content !!}
                        </div>  
                    </div>
                </div>
            </div>
            <div class="mb-4 d-flex flex-row-reverse">
                <a class="btn btn-default" href="{{ route('message.edit', $message->id) }}" role="button">Editer</a>
                <a class="btn btn-default mr-1" href="{{ route('message.destroy', $message->id) }}" role="button">Supprimer</a>
            </div>
            @endforeach
            <div class="mb-4">
                <div class="d-flex justify-content-end">
                    {{ $messages->links() }}
                </div>        
            </div>
            
            @if($post->state == 0 || Auth::User()->cAdmin >= 5)
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
            @endif
          </section>
      </div>
  </div>
</div>
@endsection