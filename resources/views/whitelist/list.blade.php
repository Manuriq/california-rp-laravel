@extends("layouts.dashboard")


@section("content")
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Espace Whitelist</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Gérer les demandes de whitelist</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('whitelist.search') }}" method="post">
                    @csrf
                    <input type="text" class="form-control input-default mb-2"name="search" placeholder="Recherche par: Joueur, Email, Discord Name, Discord Id, Discord Email">
                    <select class="form-control input-default" style="width:25%" name="statut" size="1">
                        <option value="1" selected>En attentes       
                        <option value="2">Accepté 
                        <option value="3">Refusé 
                    </select>
                    <input type="submit" class="btn btn-primary my-2" value="Chercher">
                </form>
               
                @if ($whitelists->count() == 0)
                        Il n'y a <span class="text-primary">aucune</span> demande de whitelist en cours.
                @else    
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr class="align-items-center">
                                    <th scope="col-2">Compte</th>
                                    <th scope="col-1">Admin</th>
                                    <th scope="col-1">email</th>
                                    <th scope="col-1">Status</th>
                                    <th scope="col-2">Date</th>
                                    <th scope="col-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($whitelists as $whitelist)                
                                    @foreach ($users as $user)  
                                        @if ($whitelist->member_id == $user->member_id)
                                         
                                            <tr class="text-align-center">     
                                                <td class="col-2"><a href="http://forum.california-rp.fr/index.php?/profile/{{ $user->member_id }}-{{ $user->name }}/">{{ $user->name }}</a></td>
                                                <td class="col-1"><span class="badge badge-default">{{ $whitelist->admin ? $whitelist->admin : "Non pris en charge" }}</span></td>
                                                <td class="col-1"><span class="badge badge-default">{{ $user->email }}</span></td>
                                                @if ($whitelist->statut == 1)
                                                    <td class="col-1"><span class="badge badge-warning">En attente</span></td>
                                                @elseif ($whitelist->statut == 2)
                                                    <td class="col-1"><span class="badge badge-success">Accepté</span></td>
                                                @elseif ($whitelist->statut == 3)
                                                    <td class="col-1"><span class="badge badge-danger">Refusé</span></td>
                                                @endif
                                                <td class="col-2"><span class="badge badge-default">{{ $whitelist->updated_at->translatedFormat('j F Y à h\hi') }}</span></td>        
                                                <td class="col-2"><a class="btn btn-primary" href="{{ route('whitelist.show', $whitelist->id) }}" role="button">Sélectionner</a>
                                            </tr>
                                        @endif 
                                    @endforeach
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