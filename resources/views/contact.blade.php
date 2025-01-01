@extends('welcome')

@section('content')
    
<link rel="stylesheet" href="{{ URL::asset('css/user-style.css') }}">
<section class="contact" id="contact">

<div class="title"> <h1>Contact </h1> </div>
    <div class="row">
        <div class="image">
            <img src="images/Contact us-rafiki.png" alt="">
        </div>
        <form method="post" action="{{route('contact.store')}}">
            @csrf
            <div class="inputBox">
                <input type="text" name="username" placeholder="name">
                <input type="email" name="email" placeholder="email">
            </div>
            <div class="inputBox">
                <input type="phone" name="phone" placeholder="Your PhoneNumber">
                <input type="subject" name="subject" placeholder="subject">
            </div>
            <textarea placeholder="message" name="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" class="btn" value="send message">
        </form>
    </div>

</section>

    
@endsection