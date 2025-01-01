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
                    <a href="#"class="">
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
        <div class="infoCenter">
            <div class="imgCenter">
                {{-- <img src="{{ asset('storage/images/' . $center->image) }}" alt="Center Image"> --}}
            </div>
            <div class="nameSpe">
                <h1>Hair Planet</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime, officia?</p>
            </div>
        </div>
        <div class="tours">
            <div class="card">
                <div class="card-header">
                    <h3>All Sub Spicial</h3>
                    <div class="serach"><input type="text" class="search" oninput="SearchCenter(this.value)" placeholder="search..."/>
                        <i class="fa-solid fa-magnifying-glass"></i>     </div>         
                </div>
                    <div class="table-responcive"> 
                        <table class="table">              
                            <thead>
                                <tr>
                                    <th scope="col">Name of Sub spicial</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mark</td>
                                    <td><a href="Spisal.html"><i class="fa-solid fa-circle-exclamation"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Thornton</td>
                                    <td><a href="Spisal.html"><i class="fa-solid fa-circle-exclamation"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="WhatsApp">
            <a href="#"> <img  src="whatsapp_5968841.png" class=""/></a>
        </div>
    </section> 
</section>
</main>
</section>
    <script src="js/usersScript.js"></script>
</body>
</html>