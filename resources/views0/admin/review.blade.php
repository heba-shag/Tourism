@extends('admin.sidebar')

@section('content')
<div class="recent-grid" id="reviewtable">
    <div class="tours">
        <div class="card">
            <div class="card-header">
                <h3> recent review</h3>
                <a href="#" id="addModal" >see all <li class="fa fa-arrow-right"></li></a>
            </div>
            <div class="card-body">
                <div class="table-responcive">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Customer Name</td>
                                <td>Message</td>
                                <td>Rating</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rate as $rate)
                            <tr>
                                <td>{{$rate->user->name}} </td>
                                <td>{{$rate->message}} </td>
                                <td>
                                    <div class="star-rating">
                                        <span class="fa fa-star {{$rate->star_rating>=1?'checkedd':''}}"></span>
                                        <span class="fa fa-star {{$rate->star_rating>=2?'checkedd':''}}"></span>
                                        <span class="fa fa-star {{$rate->star_rating>=3?'checkedd':''}}"></span>
                                        <span class="fa fa-star {{$rate->star_rating>=4?'checkedd':''}}"></span>
                                        <span class="fa fa-star {{$rate->star_rating>=5?'checkedd':''}}"></span>
                                    </div> review
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