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
            <h3> Mid && Tour</h3>
            <div class="btns"><a href="#" class="btn">discover more</a>
            <a href="#" class="btn" id="Get">Get a free consultation</a></div>
        </div>
        <div class="video-container">
            <video src="images/vid3.mp4" id="video-slider" loop autoplay muted></video>
        </div>
        <div class="modalOverlayConsultation">
        <div class="modalPopConsultation">

            @if(Auth()->check())
        <form action="{{route('consultation.store')}}" method="POST">
            @csrf
            <h1>Get a free consultation</h1>
            <i class="fa-solid fa-xmark"></i>
            <label for="">Select the Spicialization</label>
            <input  name="user_id" id = "user_id" value="{{ Auth::user()->id }}" type="hidden" readonly> 
        <br>
                <select class="form-select " aria-label="Default select example" name="spicialization_id">
                    @foreach($spicials as $spicial)
                    <option value={{$spicial->id}}>{{$spicial->specname}}</option>
                    @endforeach
                    </select>
                    <label for="exampleFormControlTextarea1" class="form-label">Massege</label>
                <textarea name="massege" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <div class="phonenumber">
                    <select id="country" class="form-select " name="country_code">
                    <option value="+963" selected> &#x1F1F8;&#x1F1FE; Suria    </option>
                    <option value="+20"> &#x1F1EA;&#x1F1EC;  Egypt</option>
                    <option value="+962"> &#x1F1EF;&#x1F1F4; Jordan</option>
                    <option value="+961"> &#x1F1F1;&#x1F1E7;   Lebanon</option>
                    <option value="+90"> &#x1F1F9;&#x1F1F7; Turkey</option>
                    </select>
                    <input name="phone_number" type="tel" id="output"  class="form-control"/>
                </div>
                <input type="submit" class="btn" id="exampleFormControlInput1" value="Save">
        </form>
        @else
        <h2>You Have To Login First</h2>
        <br>
        <i class="fas fa-user" id="login-btn"></i>
        <a href="" ></a>
        @endif
    </div> 
    </section>
    <!-- end home section -->

    @yield('content')
    
    
    <!-- packages section -->
    <section class="packages" id="Centers">

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

    <div class="title"> <h1>Centers</h1> </div>
        <div class="box-container">
            @foreach ($centers as $centerr)

            <div class="box">
                {{-- <img src="{{ Storage::url('public/images/' . $centerr->image) }}" alt="Center Image"> --}}
                <img src="{{ asset('images/' . $centerr->image) }}" alt="Image">

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
    <section class="filter">

<div class="title"> <h1>Top rated centers</h1> </div>
<ul class="">
    <li>Dermatology clinic</li>
    <li>international chinese body care</li>
    <li>ma'in hot spring</li>
    <li>Ibrahim Pasha Family Dental Clinic</li>
  </ul>

  <div class="contactInfoCenter activeCenter">
            <div class="info-panel">
                <h4 class="location-title">US</h4>
                <span>Dermatology clinic</span>
                <div class="line-on-side "> </div>
                <div class="location-card  ">
                <i class="fa-solid fa-envelope"></i>
                  <div class="card-content">
                    <h6 class="content-title">email:</h6><a class="email link" href="mailto:yourname@example.com">Derma@Gmail.Com</a>
                  </div>
                </div>
                <div class="location-card  ">
                <i class="fa-solid fa-phone-volume"></i>
                  <div class="card-content">
                    <h6 class="content-title">phone:</h6><a class="tel link" href="tel:0123456789">4109555933</a>
                  </div>
                </div>
              </div>
              <div id="map-container" class="gps">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.16394699743!2d51.47072757342587!3d25.265069779611785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45dba109b8b9cd%3A0xfafddbbc0531a341!2sDr.Ashish%20Bhola%20Dermatology%20Center!5e0!3m2!1sen!2s!4v1692116006199!5m2!1sen!2s" width="600" height="300"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
        </div>
 <div class="contactInfoCenter">
            <div class="info-panel">
                <h4 class="location-title">Jordan</h4>
                <span>ma'in hot spring</span>
                <div class="line-on-side "> </div>
                <div class="location-card  ">
                <i class="fa-solid fa-envelope"></i>
                  <div class="card-content">
                    <h6 class="content-title">email:</h6><a class="email link" href="mailto:yourname@example.com">ma'in@gmail.com</a>
                  </div>
                </div>
                <div class="location-card  ">
                <i class="fa-solid fa-phone-volume"></i>
                  <div class="card-content">
                    <h6 class="content-title">phone:</h6><a class="tel link" href="tel:0123456789">+962948938</a>
                  </div>
                </div>
              </div>
              <div id="map-container" class="gps">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27183.122054562842!2d35.57356106872023!3d31.609466743655133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1503462a98d4aadf%3A0xdbbf128864e510fe!2sMa&#39;in%20Hot%20Springs!5e0!3m2!1sen!2s!4v1692115745017!5m2!1sen!2s" width="600" height="300"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
        </div>
        
        <div class="contactInfoCenter">
            <div class="info-panel">
                <h4 class="location-title">syria</h4>
                <span>Ibrahim Pasha Family Dental Clinic</span>
                <div class="line-on-side "> </div>
                <div class="location-card  ">
                <i class="fa-solid fa-envelope"></i>
                  <div class="card-content">
                    <h6 class="content-title">email:</h6><a class="email link" href="mailto:yourname@example.com">ibbash@gmail.com</a>
                  </div>
                </div>
                <div class="location-card  ">
                <i class="fa-solid fa-phone-volume"></i>
                  <div class="card-content">
                    <h6 class="content-title">phone:</h6><a class="tel link" href="tel:0123456789">09382673762</a>
                  </div>
                </div>
              </div>
              <div id="map-container" class="gps">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3219.012134494549!2d37.12726427503341!3d36.21490000047539!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152ff81ee9f83269%3A0x59e9eb53a69e608!2sIbrahim%20Pasha%20Family%20Dental%20Clinic!5e0!3m2!1sen!2s!4v1692115793313!5m2!1sen!2s" width="600" height="300"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
        </div>

        
  <div class="contactInfoCenter activeCenter">
            <div class="info-panel">
                <h4 class="location-title">china</h4>
                <span>international chinese body care</span>
                <div class="line-on-side "> </div>
                <div class="location-card  ">
                <i class="fa-solid fa-envelope"></i>
                  <div class="card-content">
                    <h6 class="content-title">email:</h6><a class="email link" href="mailto:yourname@example.com">chinesebodycare@hotmail.com</a>
                  </div>
                </div>
                <div class="location-card  ">
                <i class="fa-solid fa-phone-volume"></i>
                  <div class="card-content">
                    <h6 class="content-title">phone:</h6><a class="tel link" href="tel:0123456789">04803018000</a>
                  </div>
                </div>
              </div>
              <div id="map-container" class="gps">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.9202865838015!2d51.50087047456887!3d25.273266828616965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45cf93f62b8355%3A0xc6f6f64d7d69ea75!2sInternational%20Chinese%20Body%20Care%20Houses!5e0!3m2!1sen!2s!4v1692115898242!5m2!1sen!2s" width="600" height="300"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
        </div> 
</section>

    <!-- F Q A -->
    <div class="title"> <h1>F A Q</h1> </div>
        <div class="cardGroub">
            @foreach ($mostCommonMessages as $mostCommonMessage)
            <div class="card" >
            <div class="card-body">
                <h5 class="card-title">{{$mostCommonMessage->spicialization->specname}}</h5>
                <p class="card-text">{{ $mostCommonMessage->massege }}</p>
                <p class="card-text">{{ $mostCommonMessage->total }}</p>
            </div>
        </div>
        @endforeach
    </div>
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
                <a href="#Centers">Centers</a>
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
            <script>

document.querySelector("#country").addEventListener("change",()=>{
    let val = document.querySelector("#country").value
    if(val === "+963"){
                    document.querySelector("#output").value = "+963";
                }else   if(val === "+961"){
                    document.querySelector("#output").value = "+961";
                } else   if(val === "+962"){
                    document.querySelector("#output").value = "+962";
                } else   if(val === "+90"){
                    document.querySelector("#output").value = "+90";
                } else   if(val === "+20"){
                    document.querySelector("#output").value = "+20";
                }
         
})
// <option value="+963">Suria</option>
            //        <option value="+20">Eygbt</option>
            //         <option value="+962">Jordan</option>
            //         <option value="+961">Lepanon</option>
            //         <option value="+90">Turkey</option>

        document.querySelector('#Get').addEventListener("click",()=>{
            document.querySelector(".modalOverlayConsultation").style.display = 'block';
            document.querySelector(".modalPopConsultation").style.display = 'block';
        })

        document.querySelector('.modalPopConsultation i').addEventListener("click",()=>{
            document.querySelector(".modalOverlayConsultation").style.display = 'none';
            document.querySelector(".modalPopConsultation").style.display = 'none';
        })

const listItem = document.querySelectorAll('.filter ul li');
      const contactInfoList = document.querySelectorAll('.contactInfoCenter');
      listItem.forEach((li) => {
        li.addEventListener("click", removeActive);
        li.addEventListener('click', () => {  
            const x = li.innerText.toLocaleLowerCase();
            contactInfoList.forEach(contactInfo => {
                // console.log(contactInfo.querySelector("span"))
              if(contactInfo.querySelector("span").textContent.toLocaleLowerCase().includes(x)){
                contactInfo.classList.add("activeCenter")
              }
             else {
                contactInfo.classList.remove("activeCenter")
             }
            })
  });
});
// .textContent.includes(x)
function removeActive() {
    listItem.forEach((li) => {
        li.classList.remove("activeli");
        this.classList.add("activeli");
    });
}



            const ratingStars = document.querySelector('.rating-star');

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