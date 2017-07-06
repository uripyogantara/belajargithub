@extends('templates.layout_user')

@section('content')
 <div class="row">
    @foreach($field as $value)
        <div class="col s12 m4">
            <div class="card small">
                <div class="card-image">
                    <img src='{{asset("storage/field/$value->customer_id/$value->picture")}}'>
                </div>
                <div class="card-content">
                    <span class="card-title grey-text text-darken-4">{{$value->name}}</span>
                    <form action='{{url("viewschedule/$value->id")}}' method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="date" value="{{date('Y-m-d')}}">
                        <button type="submit">Lihat Jadwal</button>
                    </form>
                    <!-- <p><a href='{{url("/schedule/$value->id/create")}}'>Lihat Jadwal</a></p> -->
                    <!-- <p></p> -->
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection