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
  
  <link href="{{ asset('/css/newcss.css')}}" rel="stylesheet">
  <link href="{{ asset('/css/posts.css')}}" rel="stylesheet">


</head>

<body>
    
    @if ($errors->any())
            <div class="alert alert-danger" style="margin-left:15%; margin-right: 15%; margin-top: 5%">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
    
    <div class="container pb-cmnt-container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-info">
                <div class="panel-body">
                    <form class="form-inline" role="form"  action="{{ route('update', $comment)}}" id="comment-form" 
                   method="post" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                    <textarea name="message" id="message" class="pb-cmnt-textarea" required>{{$comment->message}}</textarea>
                        <button class="btn btn-primary pull-right" type="submit">Edytuj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    
    
    
</body>

<?php
$links = session()->has('links') ? session('links') : [];
$currentLink = request()->path(); // Getting current URI like 'category/books/'
array_unshift($links, $currentLink); // Putting it in the beginning of links array
session(['links' => $links]); // Saving links array to the session
?>