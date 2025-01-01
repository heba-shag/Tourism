@extends('welcome')

@section('content')

    <section id="centers">
      {{-- @foreach ($about as $center) --}}
        <div class="infoCenter">
          <div class="imgCenter">
            <img src="{{ Storage::url('public/images/'.$about->image) }}" alt={{$about->centername}}>
          </div>
          <div class="nameCenter">
            <h1>{{$about->centername}}</h1>
          </div>
        </div>
        <div class="mid">
          <div class="tours">
            <div class="card">
                <div class="card-header">
                    <h3>All Spicial</h3>
                    <div class="serach"><input type="text" class="search" oninput="SearchCenter(this.value)" placeholder="search..."/>
                        <i class="fa-solid fa-magnifying-glass"></i>     </div>         
                </div>
                <div class="table-responcive"> 
                  <table class="table">              
                      <thead>
                        <tr>
                          <th scope="col">Name of spicial</th>
                          <th scope="col">Handle</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- @foreach($about->spicializations as $s) --}}
                        @foreach($spec as $s)
                        <tr>
                          <td>{{$s->specname}}</td>
                          <td><a href="{{route('Special' , $center->id)}}"><i class="fa-solid fa-circle-exclamation"></i></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
          <div class="star-container">
            <h4>Rate the Center</h4>
            <form action="{{route('ratecenter.store', ['center' => $center->id])}}" method="POST" >
              @csrf
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              <input type="hidden" name="center_id" value="{{ $center->id }}">
                <div class="star-widget">
                    <input type="radio" name="rating" id="rate-5" value="5">
                    <label for="rate-5" class="fas fa-star" title= "text"></label>
                    <input type="radio" name="rating" id="rate-4" value ="4" >
                    <label for="rate-4" class="fas fa-star" title = "text"></label>
                    <input type="radio" name="rating" id="rate-3" value="3">
                    <label for="rate-3" class="fas fa-star" title = "text"></label>
                    <input type="radio" name="rating" id="rate-2" value="2">
                    <label for="rate-2" class="fas fa-star" title = "text"></label>
                    <input type="radio" name="rating" id="rate-1" value="1">
                    <label for="rate-1" class="fas fa-star" title = "text"></label>
                </div>
                <button type="submit">Save</button>
            </form>
          </div>
        </div>
            <div class="head">
                <h3>Contact Information</h3>
            </div>
            <div class="contactInfo">

                <div class="info-panel">
                    <h4 class="location-title">{{$center->country}}</h4>
                    <div class="line-on-side "> </div>
                    <p class="location-address"> Aleppo-Forkan , express street</p>
                    <div class="location-card  ">
                    <i class="fa-solid fa-envelope"></i>
                      <div class="card-content">
                        <h6 class="content-title">email:</h6><a class="email link" href="mailto:yourname@example.com">{{$center->email}}</a>
                      </div>
                    </div>
                    <div class="location-card  ">
                    <i class="fa-solid fa-phone-volume"></i>
                      <div class="card-content">
                        <h6 class="content-title">phone:</h6><a class="tel link" href="tel:0123456789">{{$center->phone}}</a>
                      </div>
                    </div>
                  </div>
                  <div id="map-container" class="gps">
                    <iframe src="{{$center->site}}"
                        width="600" height="300" style="border:0;" 
                        allowfullscreen="" loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                  </div>
            </div>
            <div class="WhatsApp">
              <a href="#"> <img  src={{asset("images/whatsapp_5968841.png")}} class=""/></a>
          </div>
          {{-- @endforeach --}}
    </section>

</section>
    </main>
    <script src="js/usersScript.js"></script>   
@endsection