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
                    <li class="breadcrumb-item"><a href="{{ route('f.show', $forum->id) }}">{{ $forum->title }}</a></li>
                    <li class="breadcrumb-item">Création d'un Sujet</li>
                </ol>
            </div>
            <div class="card col-8 ml-auto mr-auto">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('p.store', $forum->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control input-default" name="title" placeholder="Titre du sujet" value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <textarea id="editor" class="ckeditor form-control" name="content" required>{{ old('content') }}</textarea>
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