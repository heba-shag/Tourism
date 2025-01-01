@extends('welcome')

@section('content')

<section class="review" id="review">

<div class="title"> <h1>Review</h1> </div>

    <div class="swiper review-slider">
        <div class="swiper-wrapper">
        @foreach ($rate as $rate)
            <div class="swiper-slide">
                <div class="box">
                        <img src="images/pro1.png" alt="">
                        {{-- <h3>{{$rate->user_id}}</h3> --}}
                        <h3>User-Name : {{$rate->user->name}}</h3> 
                        <h3>Comment : {{$rate->message}}</h3> 
                        <div class="star-rating">
                            <span class="fa fa-star {{$rate->star_rating>=1?'checkedd':''}}"></span>
                            <span class="fa fa-star {{$rate->star_rating>=2?'checkedd':''}}"></span>
                            <span class="fa fa-star {{$rate->star_rating>=3?'checkedd':''}}"></span>
                            <span class="fa fa-star {{$rate->star_rating>=4?'checkedd':''}}"></span>
                            <span class="fa fa-star {{$rate->star_rating>=5?'checkedd':''}}"></span>
                        </div>
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


    
@endsection