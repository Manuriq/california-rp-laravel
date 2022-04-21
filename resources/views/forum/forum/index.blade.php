@extends("layouts.dashboard")

@section("content")

<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <!-- /# row -->
          <section id="main-content">
            <div class="page-title mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Gestion des Forums</li>
                </ol>
            </div>
            <a class="btn btn-default" href="" role="button">Ajouter un Forum</a>
            <div class="card">
                <div class="card-title">
                    <h4>Liste des Forums </h4>        
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Ordre</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($forums as $forum)      
                                <tr class="text-align-center">
                                    <th scope="row"></th>
                                    <td>{{ $forum->title }}</td>
                                    <td><span class="badge badge-default">{{ $forum->order }}</span></td>
                                    @if ($forum->state == 0)
                                        <td><span class="badge badge-primary">Ouvert</td>
                                    @else
                                        <td><span class="badge badge-danger">Fermé</td>
                                    @endif
                                    <td><a class="btn btn-default" href="{{ route('p.create', $forum->id) }}" role="button">Editer</a>
                                    <a class="btn btn-default" href="{{ route('p.create', $forum->id) }}" role="button">Supprimer</a></td>
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