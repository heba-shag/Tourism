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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>
    <!-- css link -->
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="css/virtual-select.min.css">
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <!-- <div id="menu-bar1" class="fas fa-bars"></div> -->

    <section class="sidebar">
        <a href="#" class="logo"><span>T</span>ourism</a>
        <div class="sidebar-menu">
            <ul>
                <div class="menu-side">
                <li class="dash">
                    <a href="{{route('adminhome')}}" class="active"><span class=" fas fa-bars"></span> <span>dashboard</span> </a>
                </li>
                <li class="dash">
                    <a href="#" class="">
                        <span class="fa fa-users"></span> <span>Customers</span> </a>
                </li>
                <li class="dash">
                    <a href="{{route('addspicial')}}" class="">
                      <span class="fas fa-stethoscope"></span> <span>Add Spicial</span> </a>
                </li>
                <li class="dash">
                    <a href="{{route('addcenter')}}" class="">
                        <span class="fas fa-plane-departure"></span><span>Add Center</span> </a>
                </li>
                <li class="dash">
                    <a href={{route('agetrate')}} class="">
                        <span class="fa fa-star"></span><span>Reviews</span></a>
                </li>
                <li class="dash">
                    <a href={{route('getcontact')}} class="">
                        <span class="fa fa-phone"></span><span>Contacts</span></a>
                </li>
                <li class="logdash">
                    <a href={{route('home')}} class="">
                        <span class="fas fa-exchange-alt"></span><span>Go To The Website</span></a>
                </li>
                <li class="logdash">
                    @if(!auth()->check())
                        <i class="fas fa-user" id="login-btn"></i>
                    @else
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <span class="fas fa-sign-out-alt"></span><span>  Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif
                </li>
                <li class="slide"></li>
                </div>

            </ul>
        </div>
    </section>
    
    <section class="main-content">
    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                    <h1>{{$usersnum}}</h1>
                    <span>Customers</span>
                </div>
                <div>
                    <li class="fa fa-users"></li>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1>{{$visitor}}</h1>
                    <span>visitor</span>
                </div>
                <div>
                    <li class="fa fa-users"></li>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1>{{$centerssnum}}</h1>
                    <span>Centers</span>
                </div>
                <div>
                    <li class="fa fa-hotel"></li>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1>54</h1>
                    <span>Spicial</span>
                </div>
                <div>
                    <li class="fas fa-stethoscope"></li>
                </div>
            </div>
        </div>
        <!-- <i class="fas fa-trash-alt"></i> 
    <i class="fas fa-edit"></i>
    -->
        @yield('content')
        {{-- <div class="customers">
            <div class="modalOverlay">
                <div class="ModalCustomer">
                    <div class="modalBody">
                        <div class="card-body">
                            <h3>All Customers</h3>
                            <div class="table-responcive"> 
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Customer Name</td>
                                            <td>Email</td>
                                            <td>More Information</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allusers as $item)
                                        <tr>
                                                
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td  class="trigger">
                                                <div class="contact">
                                                    <li class="fa fa-user-circle"></li>
                                                    <li class="fa fa-comment"></li>
                                                    <li class="fa fa-phone"></li>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="card"> --}}
                {{-- <div class="card-header">
                    <h3> new customer</h3>
                    <a href="#" id="addModal" >see all <li class="fa fa-arrow-right"></li></a>
                </div>
                @foreach ($users as $user)
                    <div class="card-body">
                        <div class="customer">
                            <div class="info">
                                <img src="images/Study abroad-pana.png" alt="">
                                <div>
                                    <h4>{{$user->name}}</h4>
                                    <small>{{$user->email}}</small>
                                </div>
                            </div>
                            <div class="contact">
                                <li class="fa fa-user-circle"></li>
                                <li class="fa fa-comment"></li>
                                <li class="fa fa-phone"></li>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
            {{-- </div> --}}
    </section>

    {{-- <header>
        <h2>
            <label id="menu-bar" for="nav-toggle"> <span class="fas fa-bars"></span> dashboard</label>
        </h2>
        <div class="admin-search">
            <input type="search" id="search-btn" placeholder="search here..." />
            <label for="search-btn" class="fas fa-search"></label>
        </div>
    </header> --}}

    </main>
    </section>
    <script src="js/bootstrap.js"></script>
    <script src="js/adminscript.js"></script>

</body>
</html>