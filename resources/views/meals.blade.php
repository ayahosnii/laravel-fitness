@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a type="button" class="btn btn-success" href="{{route('add.food')}}">Add Food +</a>
        </div>
    </div>
</div>
@endsection
