@extends('welcome')

@section('content')

<section class="centersinfo">
        <h1 class="heading">
            <span>c</span>
            <span>e</span>
            <span>n</span>
            <span>t</span>
            <span>e</span>
            <span>r</span>
            <span>s</span>
        </h1>
        {{-- c==centers --}}
        @foreach ($about as $c)
        <div class="centercontainer">
            
            <div class="info1" style="background-image: url(/images/london2.jpg);">
                <div class="imgcenter">
                    <!-- {{-- <img src="{{asset("images/istockphoto-1498089764-1024x1024-transformed.jpeg")}}" alt=" "> --}} -->
                    <img src="{{asset("images/istockphoto-510351863-1024x1024-Kq0Lt5ilB-transformed.jpeg")}}" class="imgcentre" alt="image">
                    <h1 data-bs-toggle="modal" data-bs-target="#exampleModal">{{$c->centername}}</h1>
                </div>
                <div class="spicial">
                    <h1 class="discover-h1">available spicialization</h1>
                    <ul>
                        @foreach($c->spicializations as $s)
                        <li><a href="{{route('special' , $c->id)}}">{{$s->specname}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="someinfo">
                    <h1>about us</h1>
                    <p>{{$c->description}}</p>
                    
                </div>
                
            </div>
            
            
            <div class="info2">
                <div class="contactinfo ">
                    <h3>contact info</h3>
                    <div class="infobox">
                        <div>
                            <span><ion-icon name="location"></ion-icon></span>
                            <p>{{$c->site}} <br>{{$c->country}}</p>
                        </div>
                        <div><span><ion-icon name="mail-outline"></ion-icon></span>
                            <a href="#">{{$c->email}}</a></div>
                            <div>
                            <span><ion-icon name="call"></ion-icon></span>
                            <a href="tel:+963 99 649 234">{{$c ->phone}}</a>
                        </div>
                        <!-- social media links -->
                        <ul class="sci">
                            <li>
                                <a href="#">
                                    <ion-icon name="logo-facebook"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <ion-icon name="logo-instagram"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <ion-icon name="logo-twitter"></ion-icon>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="map" class="gps">
                    <iframe src="{{$c->site}}"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
            @endforeach
    </section>
    
   
@endsection

