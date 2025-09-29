@extends('master')
@section('title','Views')
@section('content')
    <div >
      <h2>View Products</h2>
      <p>Here you can see all your products.</p>
      <table class="table">
        <thead style="color: green">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pro as $value )
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
    <img src="{{ $value->image}}" alt="{{ $value->name }}" width="80">
</td>

                        <td>{{ $value->price }}</td>
                        <td><a href="" class="btn btn-primary">edit</a></tr>
                        <td><a href="" class="btn btn-danger">Remove</a> </td>
                    </tr>

            @endforeach
        </tbody>

      </table>
    </div>

@endsection
