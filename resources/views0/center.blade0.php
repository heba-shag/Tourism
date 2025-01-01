<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tour & travel website</title>

    <!-- //review slider
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" /> -->

    <!-- fonts & icons link  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>
    <!-- css link -->
    <link rel="stylesheet" href="{{ URL::asset('css/user-style.css') }}">
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <!-- <div id="menu-bar1" class="fas fa-bars"></div> -->
<section class="wrapper">
    <section class="sidebar">
        <div class="logoContainer"><a href="#" class="logo"><span>T</span>ourism </a> <i class="fa-solid fa-bars"></i></div>
        <div class="sidebar-menu">
            <ul>
                <div class="menu-side">
                <li class="dash">
                    <a href="Center.html" class="">
                        <span class="fa-solid fa-hospital"></span> <span class="text">Centers</span> </a>
                </li>
                <li class="dash">
                    <a href="Spisal.html"class="">
                        <span class="fas fa-search-location"></span> <span class="text">Spicial</span> </a>
                </li>
                <li class="dash">
                    <a href="#"class="">
                        <span class="fas fa-plane-departure"></span><span class="text">Add Center</span> </a>
                </li>
                <li class="dash">
                    <a href="#" class="">
                        <span class="fa fa-star"></span><span class="text">Reviews</span></a>
                </li>
                <li class="dash">
                    <a href="#" class="">
                        <span class="fa fa-phone"></span><span class="text">Contacts</span></a>
                </li>
                <li class="logdash">
                    <a href="#" class="">
                        <span class="fas fa-exchange-alt"></span><span class="text">Go To The Website</span></a>
                </li>
                <li class="logdash">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <span class="fas fa-sign-out-alt"></span><span class="text">  Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        </form>
                </li>
                </div>

            </ul>
        </div>
    </section>
    <section id="centers">
      @foreach ($about as $center)
        <div class="infoCenter">
          <div class="imgCenter">
            <img src="{{ Storage::url('public/images/' . $center->image) }}" alt={{$center->centername}}>
          </div>
          <div class="nameCenter">
            <h1>{{$center->centername}}</h1>
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
                              @foreach($center->spicializations as $s)
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
        {{-- ------------ --}}

      <form method="POST" action="{{route('ratecenter.store', ['center' => $center->id])}}">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="center_id" value="{{ $center->id }}">
        <label for="star_rating">Rate this center:</label>
        <input type="number" name="star_rating" id="star_rating" min="1" max="5" required>
        <button type="submit">Submit</button>
      </form> 
{{-- ------------- --}}

<form action="{{route('ratecenter.store', ['center' => $center->id])}}" method="POST" >
  @csrf
  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
  <input type="hidden" name="center_id" value="{{ $center->id }}">
  <div class="star-container">
          <h4>Rate the Center</h4>
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
          {{-- <a href="#">Submit</a> --}}
          
        <button type="submit">Save</button>
        </div>
      </form> 
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
          @endforeach
    </section>

</section>
    </main>
    </section>
    <script src="js/usersScript.js"></script>

</body>
</html>