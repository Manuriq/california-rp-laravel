@extends("layouts.dashboard")

@section("content")


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Vos Personnages</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste de vos personnages (Points Shop: {{ Auth::User()->shop }})</h6>
            </div>
            <div class="card-body">
                @if ($personnages->count() == 0)
                        Vous n'avez <span class="text-primary">aucun</span> personnage crée sur le serveur. Pour créer votre <span class="text-primary">personnage</span>
                         connectez-vous directement en <span class="text-primary">jeu</span>.
                    @else    
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr class="align-items-center">
                                        <th scope="col-1">#</th>
                                        <th scope="col-3">Prénom Nom</th>
                                        <th scope="col-1">Niveau</th>
                                        <th scope="col-1">Argent</th>
                                        <th scope="col-1">Status</th>
                                        <th scope="col-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personnages as $k => $personnage)      
                                    <tr class="text-align-center">
                                        <td class="col-1">{{ $k+1 }}</td>
                                        <td class="col-3">{{ $personnage->ep_Prenom }} {{ $personnage->ep_Nom }}</td>
                                        <td class="col-1"><span class="badge badge-default">{{ $personnage->ep_Niveau }}</span></td>
                                        <td class="col-1"><span class="badge badge-default">{{ $personnage->ep_Argent+$personnage->ep_Banque }}</span></td>
                                        @if ($personnage->ep_Temps == 0)
                                            <td class="col-2"><span class="badge badge-success">Disponible</span></td>
                                            <td class="col-3"></td>
                                        @elseif ($personnage->ep_Temps > time())
                                            <td class="col-2"><span class="badge badge-success">{{ date('j F Y à h\hi', $personnage->ep_Temps) }}</span></td>
                                            <td class="col-3"></td>
                                        @else
                                            <td class="col-2"><span class="badge badge-danger">Verrouilé</span></td>
                                            <td class="col-3"><a class="btn btn-primary" href="{{ route('personnage.addtime', $personnage->id) }}" role="button">Ajouter 1 Mois de jeu (500PS)</a>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
            </div>
        </div>

    </div>
</div>
@endsection