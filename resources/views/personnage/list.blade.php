@extends("layouts.dashboard")

@section("content")

<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <!-- /# row -->
          <section id="main-content">
            <div class="page-title mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Vos Personnages</li>
                </ol>
            </div>
            <a class="btn btn-default" href="{{ route('categorie.create') }}" role="button">Acheter des points shop</a>
            <div class="card">
                <div class="card-title">
                    <h4>Liste de vos personnages (Points Shop: {{ Auth::User()->shop }})</h4>        
                </div>
                <div class="card-body">
                    @if ($personnages->count() == 0)
                        Vous n'avez aucun personnage crée
                    @else    
                        <div class="table-responsive">
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th scope="col">Prénom Nom</th>
                                        <th scope="col">Niveau</th>
                                        <th scope="col">Argent</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personnages as $k => $personnage)      
                                    <tr class="text-align-center">
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $personnage->ep_Prenom }} {{ $personnage->ep_Nom }}</td>
                                        <td><span class="badge badge-default">{{ $personnage->ep_Niveau }}</span></td>
                                        <td><span class="badge badge-default">{{ $personnage->ep_Argent+$personnage->ep_Banque }}</span></td>
                                        @if ($personnage->ep_Temps == 0)
                                            <td><span class="badge badge-success">Disponible</span></td>
                                            <td></td>
                                        @elseif ($personnage->ep_Temps > time())
                                            <td><span class="badge badge-success">{{ date('j F Y à h\hi', $personnage->ep_Temps) }}</span></td>
                                            <td></td>
                                        @else
                                            <td><span class="badge badge-danger">Verrouilé</span></td>
                                            <td><a class="btn btn-default" href="{{ route('personnage.addtime', $personnage->id) }}" role="button">Ajouter 1 Mois de jeu (500PS)</a>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
          </section>
      </div>
  </div>
</div>
@endsection