@extends("layouts.dashboard")

@section("content")

<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <!-- /# row -->
          <section id="main-content">
            <div class="page-title mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Gestion des Catégories</li>
                </ol>
            </div>
            <a class="btn btn-default" href="{{ route('categorie.create') }}" role="button">Ajouter une Catégorie</a>
            <div class="card">
                <div class="card-title">
                    <h4>Liste des Catégories </h4>        
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Ordre</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $k => $categorie)      
                                <tr class="text-align-center">
                                    <td>{{ $k+1 }}</td>
                                    <td><a href="{{ route('categorie.index') }}">{{ $categorie->title }}</a></td>
                                    <td><span class="badge badge-default">{{ $categorie->order }}</span></td>
                                    <td><a class="btn btn-default" href="{{ route('categorie.edit', $categorie->id) }}" role="button">Editer</a>
                                    <a class="btn btn-default" href="{{ route('categorie.delete', $categorie->id) }}" role="button">Supprimer</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </section>
      </div>
  </div>
</div>
@endsection