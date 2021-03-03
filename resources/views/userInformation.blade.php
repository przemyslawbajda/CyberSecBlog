@extends('layouts.app')
<!DOCTYPE html>
<html lang="pl">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CyberBezpieczni</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

 <!-- Custom styles for this template -->
  <link href="{{ asset('/css/clean-blog.css')}}" rel="stylesheet">
  <!-- ikona -->
  <link rel="shortcut icon" href="{{ asset('/img/icon.jpg')}}">

  <link href="{{ asset('/css/posts.css')}}" rel="stylesheet">
  

</head>


@section('content')

                
                
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Panel użytkownika') }}</div>
                    <div class="card-body">
                            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
<!--                                    <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                        <input type="file" style="display: none;" id="profilePicture" name="file" />
                                    </div>-->
                                </div>
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"> {{$user->name}} </h2>
                                    <h10 class="d-block"> @if ($user->status_id == 1) Użytkownik @elseif ($user->status_id == 2) Administrator @endif </h10>
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Podstawowe informacje</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="statistics-tab" data-toggle="tab" href="#statistics" role="tab" aria-controls="statistics" aria-selected="false">Statyski</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Nazwa użytkownika</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$user->name}}
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$user->email}}
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Status</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                @if ($user->email_verified_at == NULL) Niezweryfikowany @else Zweryfikowany @endif
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row" style="margin:2%">
                                            
                                        </div>

                                    </div>
                                    
                                    <div class="tab-pane fade show " id="statistics" role="tabpanel" aria-labelledby="statistics-tab">
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Od</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$user->created_at}}
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Liczba komentarzy</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$user->comments->count()}}
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Liczba postów</label>
                                            </div>
                                            <div class="col-md-10 col-6">
                                                {{$user->posts->count()}}
                                                <a style="float: right" href="{{route('authorpostlist', $user->id)}}">wyświetl posty autora >></a>
                                            </div>
                                            
                                        </div>
                                        <hr />
                                    </div>
                                    
                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                        Facebook, Google, Twitter Account that are connected to this account
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
                
                
                
                
                
                
                
                
               
@endsection


