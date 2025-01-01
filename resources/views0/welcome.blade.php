<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tour & travel website</title>

    <!-- //review slider -->
    <link rel="stylesheet" href="{{ URL::asset('https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/front/css/animate.css') }}"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- fonts & icons link  -->
    <link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>
    <!-- css link -->
    <link rel="stylesheet" href="{{ URL::asset('css/user-style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <style>.rating-star {
        font-size: 24px;
        margin: 0 2px;
        transition: transform 0.3s ease-in-out;
    }
    
    .rating-star.active {
        transform: translateY(2px);
    }</style>
</head>


<body>
    <!-- header section -->
    <header>

        <!-- menu icon -->
        <div id="menu-bar" class="fas fa-bars"></div>

        <!-- logo -->
        <a href="#" class="logo"><span>T</span>ourism</a>

        <nav class="navbar">
                <a href={{route('home')}}>home</a>
                <a href=#book>book</a>
                <a href="#packages">packages</a>
                <a href="#gallery">gallery</a>
                <a href={{ route('getrate') }}>review</a>
                <a href={{route('addcontact')}}>contact</a>
                <a href={{route('rate')}}>rate us</a>
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
    <!-- end header -->

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

    <!-- register form container -->
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
        
        <!-- home section -->
        <section class="home" id="home">

        <!-- about website -->
        <div class="content">
            <h3>our tourism website</h3>
            <p>discover new places wih us Lorem ipsum dolor sit amet</p>
            <a href="#" class="btn">discover more</a>
        </div>
        <div class="video-container">
            <video src="images/vid3.mp4" id="video-slider" loop autoplay muted></video>
        </div>
    </section>
    <!-- end home section -->

    @yield('content')
    
    
    <!-- packages section -->
    <section class="packages" id="packages">

    @if(session('warning'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const modalOverlay = document.querySelector('.modalOverlay');
                const modalPop = document.querySelector('.modalPop');
                modalOverlay.style.display = 'block';
                modalPop.style.display = 'block';
                setInterval(() => {
                    modalOverlay.style.display = 'none';
                    modalPop.style.display = 'none';
                }, 3000); 
            });
        </script>
    @endif
    <div class="modalOverlay">
        <div class="modalPop">
            <div class="modalBody">
                <h1>
                Plaeas LogIn as Admin
                </h1>
            </div>
        </div>
    </div>
        <h1 class="heading">
            <span>p</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1>
    
        <div class="box-container">
            @foreach ($centers as $centerr)

            <div class="box">
                {{-- <img src="{{ asset('storage/images/' . $center->image) }}" alt="Center Image"> --}}
                <img src="{{ Storage::url('public/images/' . $centerr->image) }}" alt="Center Image">
            <div class="content">
                <h3>{{$centerr->centername}}</h3>
                <div class="rating">
                    <span>
                        @if($centerr->star === null)
                            Rating: None
                        @else
                            Rating: {{$centerr->star}}
                        @endif
                    </span>
                    
        </div>
                    <div class="star-rating">
                        <span class="fa fa-star {{$centerr->star>=1?'checkedd':''}}"></span>
                        <span class="fa fa-star {{$centerr->star>=2?'checkedd':''}}"></span>
                        <span class="fa fa-star {{$centerr->star>=3?'checkedd':''}}"></span>
                        <span class="fa fa-star {{$centerr->star>=4?'checkedd':''}}"></span>
                        <span class="fa fa-star {{$centerr->star>=5?'checkedd':''}}"></span>
                    </div>
                <h3><i class="fas fa-map-marker-alt"></i>{{$centerr->country}}</h3>
                    <p>{{$centerr->description}}</p>
                    <a href="{{route('aboutcenter' , $centerr->id)}}" class="btn">see more</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- end packages section --> 
    
    <!-- brand section -->
    <section class="brand-container">

        <div class="swiper brand-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="images/brand1.png" alt=""></div>
                <div class="swiper-slide"><img src="images/brand2.png" alt=""></div>
                <div class="swiper-slide"><img src="images/brand3.png" alt=""></div>
                <div class="swiper-slide"><img src="images/brand4.png" alt=""></div>
                <div class="swiper-slide"><img src="images/brand5.png" alt=""></div>
                <div class="swiper-slide"><img src="images/brand6.png" alt=""></div>
            </div>
        </div>
    </section>
    <!-- end brand section -->

    <!-- footer section -->
    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>about us</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione alias architecto tempora iure quam eum quibusdam aliquam laboriosam, repudiandae tenetur aperiam quidem odit fuga deserunt accusamus ullam dolorem consequatur nostrum?</p>
            </div>

            <div class="box">
                <h3>branch loacation</h3>
                <a href="#">india</a>
                <a href="#">USA</a>
                <a href="#">japan</a>
                <a href="#">france</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#home">home</a>
                <a href="#book">book</a>
                <a href="#packages">packages</a>
                <a href="#services">services</a>
                <a href="#gallery">gallery</a>
                <a href="#review">review</a>
                <a href="#contact">contact</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#">facebook</a>
                <a href="#">instagram</a>
                <a href="#">twitter</a>
                <a href="#">linkedin</a>
            </div>
        </div>

        <h1 class="credit">created by <span> eng. heba alshaghel</span> all rights reserved</h1>
    </section>
    <!-- end footer section -->



    <!-- //review slider -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <!-- js link -->
    <script src="js/script.js"></script>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="nomodule" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

    {{-- script for map --}}

    <script></script>
    <script>
        const centers = @json($centers);
        const boxContainer = document.querySelector('.box-container');
        
        function searchCenter(value){
          const searchValue = value.trim().toLowerCase();
          if (searchValue === '') {
            centers.map((c)=>{
                const html = centers.map(center => `
              <div class="box">
                <img src="/storage/images/${center.image}" alt="${center.centername}">
                <div class="content">
                  <h3>${center.centername}</h3>
                  <h3><i class="fas fa-map-marker-alt"></i>${center.site}</h3>
                  <p>${center.description}</p>
                  <a href="/c/${center.id}" class="btn">see more</a>
                </div>
              </div>
            `).join('');
            boxContainer.innerHTML = html;
        })
            return;
          }
          const filter = centers.filter((ce)=> ce.centername.toLowerCase().startsWith(searchValue))
          if(filter.length > 0 ){
            const html = filter.map(center => `
              <div class="box oneBox">
              <img src="/storage/images/${center.image}" alt="${center.centername}">
                <div class="content">
                  <h3>${center.centername}</h3>
                  <h3><i class="fas fa-map-marker-alt"></i>${center.site}</h3>
                  <p>${center.description}</p>
                  <a href="/c/${center.id}" class="btn">see more</a>
                </div>
              </div>
            `).join('');
            boxContainer.innerHTML = html;
          } else {
            boxContainer.innerHTML = '<p class="notFound">Not Found </p>';
          }
        }
            </script>
            <script>const ratingStars = documenCt.querySelector('.rating-star');

                ratingStars.forEach((star, index) => {
                    star.addEventListener('click', () => {
                        const currentRating = parseFloat(star.getAttribute('data-rating'));
                        if (currentRating > 0) {
                            star.classList.add('active');
                            const totalRatings = ratingStars.length;
                            const averageRating = totalRatings === 0 ? 0 : (currentRating + (totalRatings - 1)) / totalRatings;
                            document.getElementById('average-rating').textContent = `Average Rating: ${averageRating.toFixed(2)}`;
                        }
                    });
                });</script>

</body>



</html>