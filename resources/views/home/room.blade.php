<div class="our_room">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage text-center">
               <h2>Nos Chambres</h2>
               <p>Découvrez nos chambres confortables disponibles à la réservation.</p>
            </div>
         </div>
      </div>

      <div class="row">
         @foreach($room as $rooms)
         <div class="col-md-4 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm">
               <img src="{{ asset('room/' . $rooms->image) }}" class="card-img-top" alt="{{ $rooms->title }}">
               <div class="card-body">
                  <h5 class="card-title">{{ $rooms->title }}</h5>
                  <p class="card-text">{!! Str::limit($rooms->description, 50) !!}</p>
                  <a class="btn btn-primary" href="{{url('detailsRomm',$rooms->id)}}">Room Details</a>
            
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>
