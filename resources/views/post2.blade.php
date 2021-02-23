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

       <!--   Navbar -->
   @include('layouts.navbar')


  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/slide-2.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Czy polskie firmy są gotowe na bezpieczną pracę zdalną?</h1>
            <h2 class="subheading">O realiach pracy zdalnej w Polsce</h2>
            <span class="meta">Zamieszczony przez
              Kacper Kisielewski
              29 maja 2020 </span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Aktualna sytuacja na świecie wymusiła na wielu firmach przejście na pracę zdalną. Niekiedy taka decyzja podjęta została z dnia na dzień, bez testów systemów bezpieczeństwa danych lub sieci. Skąd to wiemy? Według raportu firmy Netology, aż 38% ekspertów bezpieczeństwa z największych firm w Polsce potwierdza, że zajmuje się tematem bezpieczeństwa danych dopiero po wykrytych incydentach.</p>

          <p>Grupa 2000 ekspertów bezpieczeństwa z największych firm w Polsce wzięła udział w badaniu do raportu It is Security Report, Sir, odpowiadając na pytania, których celem była charakteryzacja stopnia zabezpieczeń danych w ich firmach. Co ważne, badanie zostało przeprowadzone jeszcze przed rozpoczęciem pracy zdalnej na masową skalę. W ten sposób możliwe jest pokazanie jak i czy o bezpieczeństwie myślimy bez presji czasu.</p>
          
          <h2 class="section-heading">Najsłabszy element łańcucha bezpieczeństwa</h2>
          
          <p>Jedną z podstawowych form przeniknięcia do struktur firmy jest phishing. Tutaj problemem nie jest oprogramowanie, a człowiek. Aż 64% pytanych przyznało, że w ich firmach nie są przeprowadzane testy socjotechniczne. Co to może oznaczać? Łącząc brak wzorców postępowania z przymusową, często nagłą koniecznością pracy zdalnej, pracownik może okazać się zdecydowanie najłatwiejszym do złamania elementem całego systemu (nie)bezpieczeństwa. Szczególnie w sytuacji, w której nigdy wcześniej nie spotkał się z zagadnieniem wyłudzenia danych.</p>
          
          <p>Nie trzeba daleko szukać – oszuści potrafią wykorzystać absolutnie każdy pretekst do podszycia się pod firmę, osobę publiczną czy instytucję zaufania społecznego. Niedawno Ministerstwo Zdrowia informowało, że w ich imieniu wysyłane są fałszywe wiadomości SMS, w których obiecywane są szczepionki na koronawirusa. Link w wiadomości prowadził do fałszywej strony, na której oszukany miał dokonać przelewu drobnej kwoty na wskazane konto. Jeżeli przestępcy próbują w ten sposób oszukiwać zwykłych ludzi, tym bardziej pracownicy, którzy mają dostęp do kluczowych danych firmy muszą być odpowiednio przeszkoleni i wyczuleni na próby oszustwa.</p>
                    
          <h2 class="section-heading">Zabezpieczenie urządzeń mobilnych</h2>
          
          <p>Praca zdalna w dużej mierze opiera się na urządzeniach mobilnych. Kluczowe jest jednak zabezpieczenie urządzeń mobilnych przed nieuprawnionym dostępem lub uniemożliwienie odczytu danych po przypadkowym utraceniu. O ile ta ostatnia kwestia w obecnych warunkach jest mało prawdopodobna, to wykorzystywanie laptopów do zdalnego łączenia się z firmowymi serwerami jest czymś powszechnym.</p>
          
          <h2 class="section-heading">Ochrona danych w chmurze</h2>
          
          <p>Jak najłatwiej zarządzać plikami w sytuacji, w której nie przebywa się w biurze? Oczywiście za pomocą chmury. Niestety w wielu przypadkach nie jest to najbezpieczniejszy sposób na przechowywanie danych – aż 13% firm, w których pracują badani specjaliści nie stosuje żadnego zabezpieczenia! Mimo, że aż 74% uczestników badania przyznało, że jego firma nie przetwarza danych w chmurze, to warto przyjrzeć się w jaki sposób można zadbać nie tylko o bezpieczeństwo danych, ale również komunikację z chmurą.</p>
          
          <h2 class="section-heading">Bezpieczna sieć</h2>
          
          <p>Problem złośliwego oprogramowania jest jednym z kluczowych na drodze do bezpiecznej sieci. Najbardziej popularnymi rozwiązaniami są ochrona na poziomie proxy przy ruchu webowym oraz ochrona na poziomie protokołu DNS. Odpowiednio 55% i 53% pytanych ekspertów bezpieczeństwa stwierdziło, że stosują takie sposoby ochrony. Inną opcją na skuteczną ochronę jest skorzystanie z danych Threat Intelligence, dostarczanych przez producentów systemów bezpieczeństwa. W ten sposób potencjalne złośliwe oprogramowanie identyfikowane jest jeszcze zanim rozpoczęło działanie w sieci firmowej.</p>
 
        </div>
      </div>
    </div>
  </article>
  


@include('comments')





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