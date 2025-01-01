@extends('welcome')

@section('cons')

@if(Auth()->check())
        <form action="{{route('consultation.store')}}" method="POST">
        @csrf
        <h1>Get a free consultation</h1>
        <i class="fa-solid fa-xmark"></i>
        <label for="">Select the Spicialization</label>
            <input  name="user_id" id = "user_id" value="{{ Auth::user()->id }}" type="hidden" readonly> 
                <br>
                <select class="form-select " aria-label="Default select example" name="spicialization_id">
                    @foreach($spicials as $spicial)
                    <option value={{$spicial->id}}>{{$spicial->specname}}</option>
                    @endforeach
                    </select>
                    <label for="exampleFormControlTextarea1" class="form-label">Massege</label>
                <textarea name="massege" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <div class="phonenumber">
                    <select id="country" class="form-select " name="country_code">
                    <option value="+963" selected> &#x1F1F8;&#x1F1FE; Suria    </option>
                    <option value="+20"> &#x1F1EA;&#x1F1EC;  Egypt</option>
                    <option value="+962"> &#x1F1EF;&#x1F1F4; Jordan</option>
                    <option value="+961"> &#x1F1F1;&#x1F1E7;   Lebanon</option>
                    <option value="+90"> &#x1F1F9;&#x1F1F7; Turkey</option>
                    </select>
                    <input name="phone_number" type="tel" id="output"  class="form-control"/>
                </div>
                <input type="submit" class="btn" id="exampleFormControlInput1" value="Save">
        </form>
    @else
    <h2>You Have To Login First</h2>
    <br>
    <i class="fas fa-user" id="login-btn"></i>
    <a href="" ></a>
    @endif

@endsection