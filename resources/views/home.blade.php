@extends('templates.layout_user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="table bordered">
                        <tr>
                            <td>Nama</td>
                            <td>Alamat</td>
                            <td>Telepon</td>
                            <td>Link</td>
                        </tr>
                        @foreach($customer as $value)
                            <tr>
                                <td>{{$value->name}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->phone}}</td>
                                <td><a href='{{url("viewcustomer/$value->id")}}'>Link</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
