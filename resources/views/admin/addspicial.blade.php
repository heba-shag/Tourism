@extends('admin.sidebar')

@section('content')
           
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="title"> <h1>Add spicial</h1> </div>

  <form action="{{route('spicial.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="inputs">
          <div class="mb-3 w-50">
            <label for="exampleFormControlTextarea1" class="form-label mb-0">Name specialization</label>
            <input type="text" name="specname" class="form-control" id="exampleFormControlInput1" placeholder="Entre specialization ">
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Add Photo To Spicial</label>
            <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
          </div>
      </div>
          <div class="inputs">
            <div class="mb-3 w-50">
              <label for="exampleFormControlTextarea1" class="form-label">Decription</label>
              <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
            </div>
            <div class="mb-3 save2">
              <input type="submit" class="form-control" id="exampleFormControlInput1" value="Save">
          </div>
          </div>
  </form>

  
@endsection