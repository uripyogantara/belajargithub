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
                            <td>Lapangan</td>
                            <td>Hari</td>
                            <td>Jam</td>
                            <td>Link</td>
                            <td>Status</td>
                        </tr>
                        @foreach($schedule as $value)
                            <tr>
                                <td>{{$value->field_id}}</td>
                                <td>{{$value->day_id}}</td>
                                <td>{{$value->start_at}}</td>
                                <td>
                                    <form method="POST" action='{{url("book/$value->id")}}'>
                                        {{csrf_field()}}
                                        <button type="submit">Booking</button>
                                    </form>
                                </td>
                                <td>
                                    @isset($value->transaction)
                                        Not Available
                                    @endisset

                                    @empty($value->transaction)
                                        Available
                                    @endempty
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection