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
                    <li class="breadcrumb-item"><a href="{{ route('f.show', $message->post->forum->id) }}">{{ $message->post->forum->title }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('p.show', [$message->post->id]) }}">{{ $message->post->title }}</a>
                    <li class="breadcrumb-item">Edition d'un Message</li>
                </ol>
            </div>
            <div class="card col-8 ml-auto mr-auto">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('message.update', [$message->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <textarea id="editor" class="ckeditor form-control" name="content" required>{{ $message->content }}{{ old('content') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
          </section>
      </div>
  </div>
</div>
@endsection