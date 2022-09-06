@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a type="button" class="btn btn-pink" href="{{route('add.food')}}">Add Food +</a>
            <a type="button" class="btn btn-pink" href="#">Add Meal +</a>
        </div>
    </div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Food Name</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>
</div>

<div class="calendar-header">
			<span class="btn btn-prev">
				<i class="icon-angle-left"></i>
			</span>

    <span class="">July</span>

    <span class="btn btn-next">
				<i class="icon-angle-right"></i>
			</span>
</div>
@endsection
