@extends('welcome')

@section('content')



@if(!auth()->check())
    <section class="ratepopup"> 

        <div class="popup" >

            <img src="images/Login-amico.png">
            <h1 class="heading">
                    <span>o</span>
                    <span>p</span>
                    <span>p</span>
                    <span>s</span>
                    <span>!</span>
                    
            </h1>
            <p>you have to sign in ^_^</p>
            <span class="ralogbtn" id="login-btn1"> go to sign in <li class="fas fa-user" ></li></span>
        </div>
    </section> 
        

        @else
        <section class="rate" id="rate">

        <h1 class="heading">
            <span>r</span>
            <span>a</span>
            <span>t</span>
            <span>e</span>
            <span class="space"></span>
            <span>u</span>
            <span>s</span>
        </h1>

        <div class="row">
            <div class="image">
                <img src="images/Online Review-rafiki.png" alt="">
            </div>

            <form action="{{route('ratestore')}}" method="POST" >
                @csrf
                <div class="inputBox">
                    @if($errors->has('error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('error') }}
                        </div>
                    @endif
                    <h3>add comment ^-^</h3>
                </div>
                <textarea placeholder="message" name="message" id="" cols="30" rows="10"></textarea>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="submit" class="btn" value="send message">
                <div class="star-container">
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
                </div>
            </form>
        </div>
    </section>

    @endif
@endsection


