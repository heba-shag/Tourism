   <!-- header section -->
   <link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>
    <!-- css link -->

    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/user-style.css') }}">
   <header>

<!-- menu icon -->
<div id="menu-bar" class="fas fa-bars"></div>
  
<!-- logo -->
<a href="#" class="logo"><span>T</span>ourism</a>

<nav class="navbar">
        <a href={{route('home')}}>home</a>
        <a href="#Centers">Centers</a>
        <a href={{ route('getrate') }}>review</a>
        <a href={{route('addcontact')}}>contact</a>
        <a href={{route('rate')}}>rate us</a>
        @if(auth()->check() && auth()->user()->role == 'admin')
        <a href={{route('adminhome')}}>DashBoard</a>
        @endif
</nav>


<!-- icons to search & login -->
<div class="icons">
    <i class="fas fa-search" id="search-btn"></i>
    @if(!auth()->check())
        <i class="fas fa-user" id="login-btn"></i>
    @else
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i></a>
                

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        
    @endif
</div>

<!-- search form -->
<form action="" class="search-bar-container">
    <input type="search" id="search-bar" placeholder="search here..." oninput="searchCenter(this.value)">
    <label for="search-bar" class="fas fa-search"></label>
</form>
</header>
 <!-- login form container -->
 <div class="login-form-container">

<!-- close icone -->
<i class="fas fa-times" id="form-close"></i>

<!-- login form --> 
<form method="POST" action="{{ route('login') }}">
    @csrf
    <h3>sign in</h3>
    <input placeholder="enter your email" id="email" type="email" class="box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>
    <input placeholder="enter password" id="password" type="password" class="box @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    <input type="submit" value="login now" class="btn">

    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label class="form-check-label" for="remember">
        {{ __('Remember Me') }}
    </label>
    <p>forget password? <a href="#">click here</a></p>
    <p>don't have an account? <i class="fas fa-user-plus" id="register-btn"> sign up</i> </a>
    </p>
</form>
</div>

<div class="register-container">
    <i class="fas fa-times" id="form-close1"></i>
    <i class="fa fa-angle-double-left" id="back"></i>
    <!-- register form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h3>sign up</h3>

        <input id="name" type="text" class="box @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="enter your full name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        <input id="email" type="email" class="box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="enter your email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input id="password" type="password" class="box @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="enter your password">
                
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="password-confirm" type="password" class="box" name="password_confirmation" required autocomplete="new-password"placeholder="ensure your password">
                <input type="submit" value="sign up now" class="btn">
                
            </form>
            
        </div>

        <section id="centers">
      <div class="infoCenter">
        <div class="imgCenter">
            <img src="{{ asset('images/' . $about->image) }}" alt="Image">

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
                              @foreach($about->spicializations as $specialization)
                              <tr>
                                <td>{{$specialization->specname}}</td>
                                <td><i class="fa-solid fa-circle-exclamation" id="openModal"></i></td>
                              </tr>
                              @endforeach
                            </tbody>
                            {{-- ----------- --}}
                            @foreach($about->spicializations as $specialization)
                            <?php $valuesArray = explode(',', $specialization->values); ?>
                            <?php $valuesArray = explode(',', trim($about));
                            $c = count($valuesArray); ?>

                            {{-- <h2> {{ $specialization->specname }}</h2> --}}
                            {{-- <pre>Values Array: {{ print_r($valuesArray, true) }}</pre> --}}
                            <ul>
                              {{-- <h1>{{$thirdValue}}</h1> --}}
                              
                              {{-- @if (isset($valuesArray[0]))
                              <li>Value 1: {{ $valuesArray[0] }}</li>
                          @endif
                          @if (isset($valuesArray[1]))
                              <li>Value 2: {{ $valuesArray[1] }}</li>
                          @endif
                          @if (isset($valuesArray[2]))
                              <li>Value 3: {{ $valuesArray[2] }}</li>
                          @endif --}}
                            </ul>
                            @endforeach 
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
                    <input type="radio" name="star_rating" id="rate-5" value="5">
                    <label for="rate-5" class="fas fa-star" title= "text"></label>
                    <input type="radio" name="star_rating" id="rate-4" value ="4" >
                    <label for="rate-4" class="fas fa-star" title = "text"></label>
                    <input type="radio" name="star_rating" id="rate-3" value="3">
                    <label for="rate-3" class="fas fa-star" title = "text"></label>
                    <input type="radio" name="star_rating" id="rate-2" value="2">
                    <label for="rate-2" class="fas fa-star" title = "text"></label>
                    <input type="radio" name="star_rating" id="rate-1" value="1">
                    <label for="rate-1" class="fas fa-star" title = "text"></label>
                </div>
                <button type="submit">Save</button>
            </form>
          </div>
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
<div class="modalOverlay">
        <div class="modalPopSe">
          <i class="fa-solid fa-xmark"></i>
            <div class="infoCenter">
              @foreach($about->spicializations as $specialization)
      <div class="imgCenter"> 
            <img src="{{ asset('images/' . $specialization->image) }}" alt="Image">
          </div>
          <div class="nameCenter">
            <h1>{{$specialization->specname}}</h1>
          </div>
        </div>
        <p>{{$specialization->description}}</p>
            </div>
            @endforeach
    </div>

{{-- @endforeach --}}
<script >
  console.log(document.querySelectorAll(".fa-star"))
document.querySelectorAll(".fa-star").forEach(function(star) {
star.addEventListener('click', function() {
  console.log("djd")
  if(star.classList.contains("selectedddd")){
    star.classList.remove("selectedddd")
  }else{
    star.classList.add("selectedddd")
  }

});
// forEach(btn => {
});
document.querySelector('#openModal').addEventListener("click",()=>{
            document.querySelector(".modalOverlay").style.display = 'block';
            document.querySelector(".modalPopSe").style.display = 'block';
        })

        document.querySelector('.modalPopSe i').addEventListener("click",()=>{
            document.querySelector(".modalOverlay").style.display = 'none';
            document.querySelector(".modalPopSe").style.display = 'none';
        })
        let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');
let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let regisBtn = document.querySelector('#register-btn');
let regisForm = document.querySelector('.register-container');
let formClose = document.querySelector('#form-close');
let regisClose = document.querySelector('#form-close1');

let regisBack = document.querySelector('#back');
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
// let videoBtn = document.querySelectorAll('.vid-btn');
var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});


let loginbtn1 = document.querySelector('#login-btn1');

const loginBtn = document.getElementById('loginBtn');
  
const modalOverlay = document.querySelectorAll('.modalOverlay');
const modalPop = document.querySelectorAll('.modalPop');


addEventListener('click', () => {

  modalOverlay.style.display = 'none';
  modalPop.style.display = 'none';
});


window.onscroll = () => {
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
    regisForm.classList.remove('active');

}

menu.addEventListener('click', () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});


searchBtn.addEventListener('click', () => {
    searchBtn.classList.toggle('fa-times');
    searchBar.classList.toggle('active');
});

//when click login icon open login form
formBtn.addEventListener('click', () => {
    loginForm.classList.add('active');
});




//when click close icon remove login form
formClose.addEventListener('click', () => {
    loginForm.classList.remove('active');
});

regisBtn.addEventListener('click', () => {
    loginForm.classList.remove('active');
    regisForm.classList.add('active');
});

regisClose.addEventListener('click', () => {
    regisForm.classList.remove('active');
});
// loginbtn1.addEventListener('click', () => {
//     loginForm.classList.add('active');
// });
regisBack.addEventListener('click', () => {
    regisForm.classList.remove('active');
    loginForm.classList.add('active');
})



</script> 
</section>
        