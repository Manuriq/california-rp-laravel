@extends("layouts.dashboard")

@section("content")

<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <!-- /# row -->
          <section id="main-content">
            <div class="page-title mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('forum.index') }}">Gestion des Forums</a></li>
                    <li class="breadcrumb-item">Créer un Forum</li>
                </ol>
            </div>
            <div class="card col-8 ml-auto mr-auto">
                <div class="card-body">
                    <div class="basic-form">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('forum.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Titre du Forum</label>
                                <input type="text" class="form-control input-default" name="title" placeholder="Titre du Forum" value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Ordre d'affichage</label>
                                <input type="number" class="form-control input-default" name="order" placeholder="Ordre d'affichage du Forum" value="{{ old('order') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="editor" class="ckeditor form-control" name="desc" required>{{ old('desc') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Catégorie</label>
                                <select class="form-control" name="categorie">
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Statut</label>
                                <select class="form-control" name="state">
                                    <option value="0">Ouvert</option>
                                    <option value="1">Fermé</option>
                                </select>
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