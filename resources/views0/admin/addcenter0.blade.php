@extends('admin.sidebar')

@section('content')


    <div class="heading">
        <span>A</span>
        <span>D</span>
        <span>D</span>
        <span>C</span>
        <span>E</span>
        <span>N</span>
        <span>T</span>
        <span>R</span>
        <span>E</span>
    </div>

  <form method="post" action="{{route('centers.store')}}" enctype="multipart/form-data">
      @csrf
        <div class="inputs">
          <div class="mb-3 w-50">
            <label for="centername" class="form-label mb-0">Name Centre</label> 
            <input type="text" name="centername" class="form-control" placeholder="Entre Name Centre">
          </div>
          <div class="mb-3 w-50">
            <label for="exampleFormControlInput1" class="form-label mb-0">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Entre Email of Centre">
          </div>
          <div class="mb-3 w-50">
            <label for="exampleFormControlInput1" class="form-label mb-0">Phone Number</label>
            <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Entre Phone of Centre">
          </div>
        </div>
        <div class="inputs2">
            <div class="mb-3 w-50">
                <label for="exampleFormControlTextarea1" class="form-label mb-0">Site</label>
                <input type="text" name="site" class="form-control" id="exampleFormControlInput1" placeholder="Entre location of Centre">
              </div>
              <div>
                <label for="">Select the Country of Centre</label>
                <select class="form-select " aria-label="Default select example" name="country">
                    <option selected value="syria">Syria</option>
                    <option value="1">Turkey</option>
                    <option value="2">Jordan</option> 
                    {{-- @foreach ($collection as $item)
                    <option value="3">{{Labanon}}</option>
                    @endforeach --}}
                  </select>
              </div>
        </div>
        <div class="inputs3">
            <div class="mb-3 ">
                <label for="exampleFormControlTextarea1" class="form-label">Decription</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Add Photo To Centre</label>
                <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
              </div>
        </div>
        <div class="mb-3 save">
            <input type="submit" class="form-control" id="exampleFormControlInput1" value="Save">
        </div>
    </form>

    <div class="recent-grid">
      <div class="tours">
          <div class="card">
              <div class="card-header">
                  <h3>All Centers</h3>
                  <a href="{{route('addcenter')}}">addcenter  <li class="fa fa-arrow-right"></li></a>
              </div>
              <div class="card-body">
                  <div class="table-responcive"> 
                      <table width="100%">
                          <thead>
                              <tr>
                                  <td>Centre Name</td>
                                  <td>Phone Number</td>
                                  <td>More Information</td>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($centers as $center)
                                  
                              <tr>
                                  <td>{{$center->centername}}</td>
                                  <td>{{$center->phone}}</td>
                                  <td  class="trigger">
                                      <img src="images/emm.png" alt="" class="emm">
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection