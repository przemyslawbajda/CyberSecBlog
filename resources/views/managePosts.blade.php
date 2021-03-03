@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Zarządzaj swoimi postami</h1>
            <a href="{{route('addpost')}}" class="btn btn-success" style="float: right; margin-bottom: 1%">Utwórz Post</a>
            @include('layouts.postTable');
            <a href="{{route('home')}}" class="btn btn-danger" style="float: right; margin-top: 1%">Wróc</a>
        </div>
    </div>
</div>
@endsection