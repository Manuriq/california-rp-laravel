@extends("layouts.dashboard")

@section("content")

<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <!-- /# row -->
          <section id="main-content">
            <div class="page-title mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('compte.list') }}">Gestion des Utilisateurs</a></li>
                    <li class="breadcrumb-item">{{ $compte->cNom }}</li>
                    <li class="breadcrumb-item">Editer un Utilisateur</li>
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
                        <form action="{{ route('compte.update', $compte->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nom de Compte</label>
                                <input type="text" class="form-control input-default" name="cNom" placeholder="Nom de Compte" value="{{ $compte->cNom }}{{ old('cNom') }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control input-default" name="cEmail" placeholder="Email" value="{{ $compte->cEmail }}{{ old('cEmail') }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Adresse IP</label>
                                <input type="text" class="form-control input-default" name="cIp" placeholder="Adresse IP" value="{{ $compte->cIp }}{{ old('cIp') }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Grade</label>
                                <input type="text" class="form-control input-default" placeholder="Grade" value="{{ $compte->roleName() }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Avertissements</label>
                                <input type="text" class="form-control input-default" placeholder="Avertissements" value="{{ $compte->cAvert }}" disabled>
                            </div>
                            @if ($compte->cTBan > time())
                                <div class="form-group">
                                    <label>Utilisateur banni jusqu'au {{ date('d/m/Y H:i:s', $compte->cTBan) }}</label>
                                    <input type="text" class="form-control input-default" placeholder="Utilisateur banni" value="Raison: {{ $compte->ec_RBan }}" disabled>
                                </div>
                            @endif
                            @if ($compte->discord_id != 0)
                                <div class="form-group">
                                    <label>Discord ID</label>
                                    <input type="text" class="form-control input-default" placeholder="Discord ID" value="{{ $compte->discord_id }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Discord Name</label>
                                    <input type="text" class="form-control input-default" placeholder="Discord Name" value="{{ $compte->discord_name }}#{{ $compte->discord_disc }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Discord Email</label>
                                    <input type="email" class="form-control input-default" placeholder="Discord Email" value="{{ $compte->discord_email }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Discord Vérifié</label>
                                    @if ($compte->discord_verif == 0)
                                        <input type="text" class="form-control input-default" value="Non" disabled>
                                    @else
                                        <input type="text" class="form-control input-default" value="Oui" disabled>
                                    @endif 
                                </div>
                            @else
                                <div class="form-group">
                                    <label>Synchronisation Discord</label>
                                    <input type="text" class="form-control input-default" value="Non Synchronisé" disabled>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Whitelisté</label>
                                <select class="form-control input-default" name="whitelisted" size="1">
                                    @if ($compte->whitelisted == 1)
                                        <option value="1" selected>Oui          
                                        <option value="0">Non 
                                    @else
                                        <option value="1">Oui          
                                        <option value="0" selected>Non 
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Beta Test</label>
                                <select class="form-control input-default" name="beta" size="1">
                                    @if ($compte->beta == 1)
                                        <option value="1" selected>Oui          
                                        <option value="0">Non 
                                    @else
                                        <option value="1">Oui          
                                        <option value="0" selected>Non 
                                    @endif
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