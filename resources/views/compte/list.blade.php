@extends("layouts.dashboard")

@section("content")

<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <!-- /# row -->
          <section id="main-content">
            <div class="page-title mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Gestion des Utilisateurs</li>
                </ol>
            </div>
            <div class="card">
                <div class="card-title">
                    <h4>Liste des Utilisateurs </h4>        
                </div>
                <form action="{{ route('compte.search') }}" method="post">
                    @csrf
                    <input type="text" class="form-control input-default" name="search" placeholder="Chercher un utilisateur..">
                    <input type="submit" class="btn btn-default mt-2" value="Chercher">
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comptes as $compte)      
                                <tr class="text-align-center">
                                    <td>{{ $compte->id }}</td>
                                    <td><a href="{{ route('compte.edit', $compte->id) }}">{{ $compte->cNom }}</a></td>
                                    <td><span class="badge badge-default">{{ $compte->cEmail }}</span></td>
                                    <td><a class="btn btn-default" href="{{ route('compte.edit', $compte->id) }}" role="button">Editer</a>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $comptes->links() }}
                    </div>
                </div>
            </div>
          </section>
      </div>
  </div>
</div>
@endsection