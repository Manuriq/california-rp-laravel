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
                <h6 class="m-0 font-weight-bold text-primary">Questionnaire whitelist de {{ $user->name }} ({{ $user->email }})</h6>
            </div>
            <div class="card-body">
                <form action="{!! route('whitelist.admin', $whitelist->id) !!}" method="POST">
                    @csrf
                    <br>
                    <div class="form-group">
                        <label>Expliquez ce qu'est le PowerGame, MetaGame, DeathMatch, RolePlay et donnez 2 exemples pour chacune de vos explications:</label>
                        <p>{!! $whitelist->res_a !!}</p>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Mise en situation n°1: Vous êtes entourés par un gang adverse, comment agissez vous ? (Décrivez le plus précisément votre scène):</label>
                        <p>{!! $whitelist->res_b !!}</p>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Mise en situation n°2: Vous êtes un policier en service lors d'une course poursuite, le suspect devant vous sort une arme
                            et vous tire dessus, comment réagissez-vous ? (Décrivez le plus précisément votre scène):</label>
                        <p>{!! $whitelist->res_c !!}</p>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Mise en situation n°3: Un joueur vient de vous tuer sans aucune raison, comment réagissez-vous ? (Décrivez le plus précisément votre scène):</label>
                        <p>{!! $whitelist->res_d !!}</p>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Décrivez toutes vos expériences RolePlay:</label>
                        <p>{!! $whitelist->res_e !!}</p>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Expliquez-nous ce que vous comptez faire sur le serveur:</label>
                        <p>{!! $whitelist->res_f !!}</p>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Décision modération:</label>
                        <select class="form-control input-default" name="statut" size="1">
                                <option value="2">Valider          
                                <option value="0" selected>Refuser 
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Commentaire modération:</label>
                        <textarea id="editor" class="ckeditor form-control" name="comment">{{ $whitelist->comment }}{{ old('comment') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer le questionnaire</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection