@extends('welcome')

@section('content')
    
<section class="book" id="book">

    {{-- <!-- @foreach ($Country as $c) --}}

    {{-- <h1>{{$c->Country->id}}</h1> --}}
        
    {{-- @endforeach --> --}}
    
<h1 class="heading">
    <span>b</span>
    <span>o</span>
    <span>o</span>
    <span>k</span>
    <span class="space"></span>
    <span>n</span>
    <span>o</span>
    <span>w</span>
</h1>

<div class="row">
    <div class="image">
        <img src="images/Study abroad-rafiki.png" alt="">
    </div>

    <form action="">
        <div class="inputBox">
            <h3>where to</h3>
            <input type="text" placeholder="place name">
        </div>
        <div class="inputBox">
            <h3>how many</h3>
            <input type="number" placeholder="number of guestes">
        </div>
        <div class="inputBox">
            <h3>arrivals</h3>
            <input type="date">
        </div>
        <div class="inputBox">
            <h3>leaving</h3>
            <input type="date">
        </div>
        <input type="submit" class="btn" value="book now">
    </form>
</div>
</section>

    
@endsection