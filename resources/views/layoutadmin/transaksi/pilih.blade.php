@extends('layouts.mainmenu')
@section('content')
<section class="section contact">
  @foreach ($perusahaan as $pr)
    <div class="row gy-4">
      
      <div class="col-xl-12">
       
        <div class="row">
     
          <a href="/{{$pr->situs}}">
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="assets/img/card.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <h5 class="card-title">{{$pr->namaperusahaan}}</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                </div>
              </div>
            </div><!-- End Card with an image on left -->
          </a>            
        
        </div>

      </div>
    

    </div>
    @endforeach
  </section>
  @endsection