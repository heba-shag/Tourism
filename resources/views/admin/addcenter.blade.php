@extends('admin.sidebar')

@section('content')


<div class="title"> <h1>Add Center</h1> </div>

  <form method="post" action="{{route('centers.store')}}" enctype="multipart/form-data" >
      @csrf
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
                    <option value="syria">Syria</option>
                    <option value="Turky">Turkey</option>
                    <option value="Jordan">Jordan</option>
                    <option value="china">china</option>
                    <option value="US">US</option>
                  </select>

                  <label for="">Select the spicialization of Centre</label>
                  <select name="spicializations[]" id="multipleSelect" multiple class="form-select " aria-label="Default select example" name="native-select" placeholder="Native Select" data-search="true" data-silent-initial-value-set="true">
                    @foreach ($data as $dataa)
                      <option  value="{{ $dataa->id }}">{{$dataa->specname}}</option>
                    @endforeach
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
                  
                  <input type="text" class="search" oninput="SearchCenter(this.value)" placeholder="search..."/>
                  <i class="fa-solid fa-magnifying-glass"></i>
                  <a href="{{route('addcenter')}}">addcenter  <li class="fa fa-arrow-right"></li></a>
            
              </div>
              <div class="card-body">
                  <div class="table-responcive"> 
                      <table width="100%">
                          <thead>
                              <tr>
                                  <td>Centre Name</td>
                                  <td>Phone Number</td>
                                  <td>Delete Center</td>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($centers as $center)
                                  
                              <tr>
                                  <td>{{$center->centername}}</td>
                                  <td>{{$center->phone}}</td>
    
                                  <td>
                            
                          
                                            @if(isset($center))
                                            <form method="post" action="{{ route('centers.destroy', $center->id) }}" class="del">
                                              @csrf
                                              @method('DELETE')
                                              <button class="btn btn-danger">Delete</button>
                                          </form>
                                            @endif
                                            <i class="fas fa-exclamation-circle" id="openModal"></i>
                                          </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <div class="modalOverlay">
        <div class="modalPopSe">
        <i class="fas fa-times"></i>
            <div class="infoCenter">
      <div class="imgCenter"> 
            <img src="images/0723dfd10075aee37a1804a728349dc3.jpg" alt="Image">
          </div>
          <div class="nameCenter">
            <h1>Derma</h1>
          </div>
        </div>
        <p>lorem10</p>
            </div>
         
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/virtual-select.min.js"></script>
<script>

VirtualSelect.init({ 
  ele: '#multipleSelect' 
});

const centerNames = @json($center);
const AllCenter = @json($centers);

function SearchCenter(value) {
  const firstChar = value.charAt(0).toLowerCase();
  document.querySelectorAll("tbody tr").forEach(row => {
    const centername = row.querySelector("td:first-child").textContent.toLowerCase();
    if (centername.startsWith(firstChar)) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  });
}
document.querySelectorAll('#openModal').forEach(btn => {
  btn.addEventListener("click",()=>{
    document.querySelectorAll(".modalOverlay").forEach(mod1 => {mod1.style.display = 'block'})
    document.querySelectorAll(".modalPopSe").forEach(mod2 => {mod2.style.display = 'block'})
   
  })

})
document.querySelectorAll('.fa-times').forEach(btn => {
  btn.addEventListener("click",()=>{
    document.querySelectorAll(".modalOverlay").forEach(mod1 => {mod1.style.display = 'none'})
    document.querySelectorAll(".modalPopSe").forEach(mod2 => {mod2.style.display = 'none'})
   
  })

})
// document.querySelector('#openModal').addEventListener("click",()=>{
//             document.querySelector(".modalOverlay").style.display = 'block';
//             document.querySelector(".modalPopSe").style.display = 'block';
//         })

        document.querySelector('.modalPopSe i').addEventListener("click",()=>{
            document.querySelector(".modalOverlay").style.display = 'none';
            document.querySelector(".modalPopSe").style.display = 'none';
        })
</script>
@endsection
