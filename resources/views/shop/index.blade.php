@extends("layouts.dashboard")

@section("content")

<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <!-- /# row -->
          <section id="main-content">
            <div class="page-title mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Acheter des points shop</li>
                </ol>
            </div>
            <a class="btn btn-default" href="{{ route('personnage.list') }}" role="button">Retour aux personnages</a>
            <div class="card">
                <div class="card-title">
                    <h4>Acheter des points shop</h4>        
                </div>
                <div class="card-body">
                    <form action="{{ route('shop.charge') }}" method="POST">
                        @csrf
                        <input type="hidden" name="amount" value="5">
                        <input class="btn btn-default" type="submit" name="submit" value="Acheter 500 Point Shop">
                    </form>
                </div>
            </div>
          </section>
      </div>
  </div>
</div>
@endsection