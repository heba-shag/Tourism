@extends('welcome')

@section('content')
    

<section class="contact" id="contact">

    <h1 class="heading">
        <span>c</span>
        <span>o</span>
        <span>n</span>
        <span>t</span>
        <span>a</span>
        <span>c</span>
        <span>t</span>
    </h1>

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