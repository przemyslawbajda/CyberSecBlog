<!DOCTYPE html>
<html lang="pl">


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CyberBezpieczni</title>

<!--   Bootstrap core CSS -->
  <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
<!--   Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

<!--   Custom styles for this template -->
  <link href="{{ asset('/css/clean-blog.css')}}" rel="stylesheet">
 
  <!-- ikona -->
  <link rel="shortcut icon" href="{{ asset('/img/icon.jpg')}}">

</head>

<body>
    
<!--   Navbar -->
   @include('layouts.navbar')


  <!-- Page Header -->
  <header class="masthead" >

    
    <!-- karuzela -->
    <div id="przykladowaKaruzela4" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#przykladowaKaruzela4" data-slide-to="0" class=""></li>
            <li data-target="#przykladowaKaruzela4" data-slide-to="1"></li>
            <li data-target="#przykladowaKaruzela4" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" >
            
           <div class="carousel-item active">
        <img class="d-block w-100"  src="img/slide-1.jpg" alt="Pierwszy slajd">
      <div class="carousel-caption">
          <a href=""> <h1>Czym jest cyberbezpieczenstwo?</h1>
        <p>i dlaczego jest tak ważne?</p></a>
      </div>
    </div> 
            
            
        @foreach ($posts as $post)
          <div class="carousel-item">
        <img class="d-block w-100"  src="storage/img/{{$post->file_path}}" alt="" style='width: 1360px; height: 825px'>
      <div class="carousel-caption">
          <a href="{{ route('showpost', $post->id) }}"> <h1>{{$post->header}}</h1>
        <p>{{$post->subheader}}</p></a>
      </div>
    </div>  
          @endforeach  
            
           
          
  <a class="carousel-control-prev" href="#przykladowaKaruzela4" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Poprzedni</span>
  </a>
  <a class="carousel-control-next" href="#przykladowaKaruzela4" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Następny</span>
  </a>
</div>
    
    
  </header>

  
  <div class="container">

  <!-- Page Heading -->
  <h1 class="my-4">Najnowsze Artykuły
    <small></small>
  </h1>

  <div class="row">
      
      @foreach($posts as $post)
      
      <div class="col-lg-6 mb-4">
      <div class="card h-100">
          <a href="{{ route('showpost', $post->id ) }}"><img class="card-img-top" src="storage/img/{{$post->file_path}}" style="width: 540px; height: 302px" alt=""></a>
        <div class="card-body">
          <h4 class="card-title">
              <a href="{{ route('showpost', $post->id) }}"> {{$post->header}}</a>
          </h4>
          <p class="card-text">{{$post->subheader}}</p>
        </div>
      </div>
    </div>
      
      
      
      
      
      @endforeach
      
      
    <div class="col-lg-6 mb-4">
      <div class="card h-100">
          <a href=""><img class="card-img-top" src="img/silde-min-1.jpg" alt=""></a>
        <div class="card-body">
          <h4 class="card-title">
              <a href="">Czym jest cyberbezpieczenstwo?</a>
          </h4>
          <p class="card-text">Jeszcze do niedawna nie zdawano sobie sprawy, że cyberagresja stanie się realnym i poważnym zagrożeniem dotykającym praktycznie każdego z nas. Szybko pojawiła się koncepcja cyberbezpieczeństwa jako formy przeciwdziałania i prewencji zagrożeń cyfrowych.</p>
        </div>
      </div>
    </div>
      
      
      
  
  <!-- /.row -->

  

</div>
  
  <!-- Pagination -->
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
    </li>
  </ul>


  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>

<?php
$links = session()->has('links') ? session('links') : [];
$currentLink = request()->path(); // Getting current URI like 'category/books/'
array_unshift($links, $currentLink); // Putting it in the beginning of links array
session(['links' => $links]); // Saving links array to the session
?>