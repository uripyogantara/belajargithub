@extends('templates.layout')

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-12">
            @isset($field)
            <table class="table">
                <tr>
                    <td>Gambar</td>
                    <td>Nama Lapangan</td>
                    <td>Created at</td>
                    <td>Updated at</td>
                    <td>Action</td>
                @foreach($field as $value)
                </tr>
                    <td><img src='{{asset("storage/field/$value->customer_id/$value->picture")}}' height="100px"></td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>{{$value->updated_at}}</td>
                    <td><a href="/field/{{$value->id}}/edit" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form method="POST" action="/field/{{$value->id}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" name="delete" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                <tr>
                @endforeach
            </table>
            @else
                <h2>Kosong</h2>
            @endif
        </div>
    </div>
<!-- </div> -->
@endsection
