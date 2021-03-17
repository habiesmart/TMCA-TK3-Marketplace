@extends('Layout.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('/css/Layout/master.css') }}">
@endsection
@section('content')
    <div class="card text-middle">
      <div class="card-body">
        <h4 class="card-title">Title</h4>
        <div class="row text-center">
            <div class="col-sm">
                <a href="#" class="btn btn-warning text-center btn-jumbo my-3">Setting</a>
            </div>
            <div class="col-sm">
                <a href="#" class="btn btn-primary text-center btn-jumbo my-3">Home</a>
            </div>
            <div class="col-sm">
                <a href="#" class="btn btn-success text-center btn-jumbo my-3">Post</a>
            </div>
        </div>
      </div>
    </div>
@endsection