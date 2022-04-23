@extends("layouts.dashboard")

@section("content")

<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-8 p-r-0 title-margin-right">
                  <div class="page-header">
                      <div class="page-title">
                          <h1>Salut, <span>{{ Auth::User()->cNom }}</span></h1>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /# row -->
          <section id="main-content">
            Le site est encore en développement, n'hésitez pas à report les bugs
          </section>
      </div>
  </div>
</div>
@endsection