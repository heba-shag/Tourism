{{-- <!DOCTYPE html>
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

    <!-- css link -->
    <link rel="stylesheet" href="css/admin-style.css">
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <!-- <div id="menu-bar1" class="fas fa-bars"></div> -->

    <section class="sidebar">
        <a href="#" class="logo"><span>T</span>ourism</a>
        <div class="sidebar-menu">
            <ul>
                <!-- <div class="menu-side"> -->
                <li class="dash">
                    <a href="#" class="active"><span class=" fas fa-bars"></span> <span>dashboard</span> </a>
                </li>
                <li class="dash">
                    <a href="#" class="">
                        <span class="fa fa-users"></span> <span>customers</span> </a>
                </li>
                <li class="dash">
                    <a href="#" class="">
                        <span class="fas fa-search-location"></span> <span>countries</span> </a>
                </li>
                <li class="dash">
                    <a href="#" class="">
                        <span class="fas fa-plane-departure"></span><span>total tours</span> </a>
                </li>
                <li class="dash">
                    <a href="#" class="">
                        <span class="fa fa-star"></span><span>reviews</span></a>
                </li>
                <li class="dash">
                    <a href="#" class="">
                        <span class="fa fa-phone"></span><span>contacts</span></a>
                </li>
                <li class="logoutdash">
                    <a href="#" class="">
                        <span class="fas fa-sign-out-alt"></span><span>logout</span></a>
                </li>
                <!-- </div> -->

            </ul>
        </div>
    </section>

    <section class="main-content">
        <header>
            <h2>
                <label id="menu-bar" for="nav-toggle"> <span class="fas fa-bars"></span> dashboard</label>
            </h2>
            <div class="admin-search">
                <input type="search" id="search-btn" placeholder="search here..." />
                <label for="search-btn" class="fas fa-search"></label>
            </div>
        </header>

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>customers</span>
                    </div>
                    <div>
                        <li class="fa fa-users"></li>
                    </div>
                </div>


                <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>centers</span>
                    </div>
                    <div>
                        <li class="fa fa-hotel"></li>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Guides</span>
                    </div>
                    <div>
                        <li class="fa fa-address-book"></li>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="tours">
                    <div class="card">
                        <div class="card-header">
                            <h3>recent tours</h3>
                            <a href="#">see all <li class="fa fa-arrow-right"></li></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responcive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>tour title</td>
                                            <td>department</td>
                                            <td>status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>entertatment</td>
                                            <td>guid team</td>
                                            <td>
                                                <span class="status purple"></span> review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>therapy</td>
                                            <td>guid team</td>
                                            <td>
                                                <span class="status pink"></span> review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>therapy</td>
                                            <td>guid team </td>
                                            <td>
                                                <span class="status orange"></span> review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>entertatment</td>
                                            <td>guid team </td>
                                            <td>
                                                <span class="status purple"></span> review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>therapy</td>
                                            <td>guid team </td>
                                            <td>
                                                <span class="status pink"></span> review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>therapy </td>
                                            <td>guid team </td>
                                            <td>
                                                <span class="status orange"></span> review
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>new customer</h3>
                            <a href="#">see all <li class="fa fa-arrow-right"></li></a>
                        </div>
                        <div class="card-body">
                            <div class="customer">
                                <div class="info">
                                    <img src="images/Study abroad-pana.png" alt="">
                                    <div>
                                        <h4>mario .sam</h4>
                                        <small>ceo export</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <li class="fa fa-user-circle"></li>
                                    <li class="fa fa-comment"></li>
                                    <li class="fa fa-phone"></li>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="images/Study abroad-pana.png" alt="">
                                    <div>
                                        <h4>mario .sam</h4>
                                        <small>ceo export</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <li class="fa fa-user-circle"></li>
                                    <li class="fa fa-comment"></li>
                                    <li class="fa fa-phone"></li>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="images/Study abroad-pana.png" alt="">
                                    <div>
                                        <h4>mario .sam</h4>
                                        <small>ceo export</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <li class="fa fa-user-circle"></li>
                                    <li class="fa fa-comment"></li>
                                    <li class="fa fa-phone"></li>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="images/Study abroad-pana.png" alt="">
                                    <div>
                                        <h4>mario .sam</h4>
                                        <small>ceo export</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <li class="fa fa-user-circle"></li>
                                    <li class="fa fa-comment"></li>
                                    <li class="fa fa-phone"></li>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cenetrs">

                    </div>

                    <div class="guids">

                    </div>
                </div>
        </main>
    </section>
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.js"></script> -->
    <script src="js/adminscript.js"></script>

</body>

</html> --}}