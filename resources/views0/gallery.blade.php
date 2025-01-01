@extends('welcome')

@section('content')
    

<section class="gallery" id="gallery">
        
    <h1 class="heading">
        <span>g</span>
        <span>a</span>
        <span>l</span>
        <span>l</span>
        <span>e</span>
        <span>r</span>
        <span>y</span>
    </h1>

    <div class="box-container">
        
        @foreach ($center as $center)
        <div class="box">
            
            <img src="images/paris2.jpg" alt="">
            <div class="content">
                <h3>{{$center->centername}}</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam aspernatur, corporis dicta quod non provident porro voluptatum molestiae, blanditiis quos repellat quisquam.</p>
                <a href="{{route('aboutcenter' , $center->id)}}" class="btn">see more</a>
            </div>
        </div>
        @endforeach
        
    </div>
</section>
    
@endsection