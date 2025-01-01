@extends('admin.sidebar')

@section('content')

<div class="modal">
    <div class="modal-content">
        <span class="close-button"></span>
        <div class="imgAndInfo">
            <div><img src="images/paris2.jpg" alt=""></div>
            <div class="text">
                <div ><h3>Email : </h3> <p>Centre@gmail.com</p></div>
                <div><h3>Description:</h3><p>Lorem ipsum dolor sit amet,</p></div>
                <div ><h3>Site :</h3> <p>Lorem, ipsum dolor.</p></div>
                <div ><h3>Country:</h3> <p>Syria</p></div>
            </div>
        </div>
    </div>
</div>
{{-- ---------- --}}

<div class="customers">
    <div class="modalOverlay">
        <div class="ModalCustomer">
            <div class="modalBody">
                <div class="card-body">
                    <h3>All Customers</h3>
                    <div class="table-responcive"> 
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>Customer Name</td>
                                    <td>Email</td>
                                    <td>More Information</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allusers as $item)
                                <tr>
                                        
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td  class="trigger">
                                        <div class="contact">
                                            <li class="fa fa-user-circle"></li>
                                            <li class="fa fa-comment"></li>
                                            <li class="fa fa-phone"></li>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        <h3> new customer</h3>
        <a href="#" id="addModal" >see all <li class="fa fa-arrow-right"></li></a>
    </div>
    @foreach ($users as $user)
        <div class="card-body">
            <div class="customer">
                <div class="info">
                    <img src="images/Study abroad-pana.png" alt="">
                    <div>
                        <h4>{{$user->name}}</h4>
                        <small>{{$user->email}}</small>
                    </div>
                </div>
                <div class="contact">
                    <li class="fa fa-user-circle"></li>
                    <li class="fa fa-comment"></li>
                    <li class="fa fa-phone"></li>
                </div>
            </div>
        </div>
    @endforeach
</div>



{{-- ------------- --}}

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
    
@endsection