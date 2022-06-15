@extends("layouts.dashboard")

@section("content")
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Questionnaire whitelist de {{ $user->name }} ({{ $user->email }}) ({{ $whitelist->tryout }}/3)</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-12 mb-4">
        <form action="{!! route('whitelist.admin', $whitelist->id) !!}" method="POST">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Expliquez ce qu'est le PowerGame, MetaGame, DeathMatch, RolePlay et donnez 2 exemples pour chacune de vos explications:</h6>
                </div>
                <div class="card-body">
                    {!! $whitelist->res_a !!} 
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Mise en situation n°1: Vous êtes entourés par un gang adverse, comment agissez vous ? (Décrivez le plus précisément votre scène):</h6>
                </div>
                <div class="card-body">
                    {!! $whitelist->res_b !!} 
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Mise en situation n°2: Vous êtes un policier en service lors d'une course poursuite, le suspect devant vous sort une arme
                        et vous tire dessus, comment réagissez-vous ? (Décrivez le plus précisément votre scène):</h6>
                </div>
                <div class="card-body">
                    {!! $whitelist->res_c !!} 
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Mise en situation n°3: Un joueur vient de vous tuer sans aucune raison, comment réagissez-vous ? (Décrivez le plus précisément votre scène):</h6>
                </div>
                <div class="card-body">
                    {!! $whitelist->res_d !!} 
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Décrivez toutes vos expériences RolePlay:</h6>
                </div>
                <div class="card-body">
                    {!! $whitelist->res_e !!} 
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Expliquez-nous ce que vous comptez faire sur le serveur:</h6>
                </div>
                <div class="card-body">
                    {!! $whitelist->res_f !!} 
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Décision modération:</h6>
                </div>
                <div class="card-body">
                    <select class="form-control input-default" name="statut" size="1">
                        <option value="2">Valider          
                        <option value="3" selected>Refuser 
                    </select>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Commentaire modération:</h6>
                </div>
                <div class="card-body">
                    <textarea id="editor" class="ckeditor form-control" name="comment" required>{{ $whitelist->comment }}{{ old('comment') }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
</div>
@endsection