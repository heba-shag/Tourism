@extends('welcome')

@section('content')

<h1 class="heading">
  <span>s</span>
  <span>p</span>
  <span>e</span>
  <span>c</span>
  <span>i</span>
  <span>a</span>
  <span>l</span>
  <span>i</span>
  <span>z</span>
  <span>a</span>
  <span>i</span>
  <span>t</span>
  <span>i</span>
  <span>o</span>
  <span>n</span>
  <span>s</span>
</h1>
<table class="table w-75">

  <tbody>

    @foreach ($about as $special)
    @foreach($special->spicializations as $s)
    <tr>
      <th scope="row" data-bs-toggle="modal" data-bs-target="#exampleModal">{{$s->specname}}</th>
      <td><img src="{{asset("images/icons8-exclamation-50.png")}}" data-bs-toggle="modal" data-bs-target="#exampleModal"/></td>
    </tr>
    
    @endforeach
    
    @endforeach
    
    {{-- 
      
      <tr>
      <th scope="row" data-bs-toggle="modal" data-bs-target="#exampleModal" >Skin</th>
      <td><img src="{{asset("images/icons8-exclamation-50.png")}}"data-bs-toggle="modal" data-bs-target="#exampleModal" /></td>
    </tr>
    
    --}}
  </tbody>
  
</table>

{{-- Model --}}

@foreach ($about as $item)
@foreach($item->spicializations as $s)
     
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <img src="images/aaa.jpg" alt="">
        <h1 class="modal-title" id="exampleModalLabel">{{$s->specname}}</h1>
      </div>
      <div class="modal-body">
          {{$s->description}}
      </div>
      <div class="modal-footer">
        <img  src="{{asset("images/icons8-whatsapp-48(1).png")}}" alt="">
      </div>
    </div>
  </div>
</div> 
@endforeach
@endforeach
@endsection