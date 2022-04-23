@extends("layouts.dashboard")

@section("content")

<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <!-- /# row -->
          <section id="main-content">
            <div class="page-title mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('categorie.list') }}">Gestion des Catégories</a></li>
                    <li class="breadcrumb-item">{{ $categorie->title }}</li>
                    <li class="breadcrumb-item">Editer une Catégorie</li>
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
                        <form action="{{ route('categorie.update', $categorie->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Titre de la Catégorie</label>
                                <input type="text" class="form-control input-default" name="title" placeholder="Titre de la Catégorie" value="{{ $categorie->title }}{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Ordre d'affichage</label>
                                <input type="number" class="form-control input-default" name="order" placeholder="Ordre d'affichage de la Catégorie" value="{{ $categorie->order }}{{ old('order') }}" required>
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