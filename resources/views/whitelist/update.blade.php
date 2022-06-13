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
                <h6 class="m-0 font-weight-bold text-primary">Questionnaire Whitelist ({{ $whitelist->tryout }}/3 tentatives)</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('whitelist.update', $whitelist->id) }}" method="POST">
                    @csrf
                    <br>
                    <div class="form-group">
                        <label>Expliquez ce qu'est le PowerGame, MetaGame, DeathMatch, RolePlay et donnez 2 exemples pour chacune de vos explications:</label>
                        <textarea id="editor" class="ckeditor form-control" name="res_a" required>{{ $whitelist->res_a }}{{ old('res_a') }}</textarea>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Mise en situation n°1: Vous êtes entourés par un gang adverse, comment agissez vous ? (Décrivez le plus précisément votre scène):</label>
                        <textarea id="editor" class="ckeditor form-control" name="res_b" required>{{ $whitelist->res_b }}{{ old('res_b') }}</textarea>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Mise en situation n°2: Vous êtes un policier en service lors d'une course poursuite, le suspect devant vous sort une arme
                            et vous tire dessus, comment réagissez-vous ? (Décrivez le plus précisément votre scène):</label>
                        <textarea id="editor" class="ckeditor form-control" name="res_c" required>{{ $whitelist->res_c }}{{ old('res_c') }}</textarea>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Mise en situation n°3: Un joueur vient de vous tuer sans aucune raison, comment réagissez-vous ? (Décrivez le plus précisément votre scène):</label>
                        <textarea id="editor" class="ckeditor form-control" name="res_d" required>{{ $whitelist->res_d }}{{ old('res_d') }}</textarea>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Décrivez toutes vos expériences RolePlay:</label>
                        <textarea id="editor" class="ckeditor form-control" name="res_e" required>{{ $whitelist->res_e }}{{ old('res_e') }}</textarea>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Expliquez-nous ce que vous comptez faire sur le serveur:</label>
                        <textarea id="editor" class="ckeditor form-control" name="res_f" required>{{ $whitelist->res_f }}{{ old('res_f') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer le questionnaire</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection