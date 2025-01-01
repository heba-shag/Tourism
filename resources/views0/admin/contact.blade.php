@extends('admin.sidebar')

@section('content')
<div class="recent-grid" id="reviewtable">
    <div class="tours">
        <div class="card">
            <div class="card-header">
                <h3>recent reviews</h3>
                <a href="#">see all <li class="fa fa-arrow-right"></li></a>
            </div>
            <div class="card-body">
                <div class="table-responcive">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Customer Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Subject</td>
                                <td>Message</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td>{{$contact->username}} </td>
                                <td>{{$contact->email}} </td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{$contact->message}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection