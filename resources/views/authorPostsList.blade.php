@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Posty użytkownika {{$posts->first()->user->name }}</h1> 
            @include('layouts.postTable')
            <a href="{{route('showuser', $posts->first()->user->id)}}" class="btn btn-danger" style="float: right; margin-top: 1%">Wróc</a> 
        </div>
    </div>
</div>
@endsection