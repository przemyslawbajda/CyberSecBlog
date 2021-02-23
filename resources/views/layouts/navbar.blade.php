

<nav @if(Request::path() == 'shop' or Request::path() == 'login' or Request::path() == 'register' or Request::path() == 'home' or Request::path() == 'edit' or Request::is('updateuserform*') or Request::is('password*') or Request::is('email*')
     or Request::is('addpost*') or Request::is('manageposts') )
      style="background: black " @endif class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container" >
      <a class="navbar-brand" href="{{ route('index') }}">CyberBezpieczni</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('index') }}">Strona Główna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('shop') }}">Sklep</a>
          </li>
          
           @guest 
            <li class="nav-item"> 
                <a class="nav-link"  href="{{ route('login') }}">{{ __('Login') }}</a> 
            </li>
            
            @if (Route::has('register')) 
            <li class="nav-item"> 
                <a class="nav-link" href="{{ route('register') }}">{{ __('Rejestracja') }}</a> 
            </li> 
            @endif
            @else 
            <li class="nav-item dropdown"> 
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" 
                   role="button" data-toggle="dropdown" aria-haspopup="true" 
                   aria-expanded="false" v-pre> 
                    {{ Auth::user()->name }} <span class="caret"></span> 
                </a>
                
                <div class="dropdown-menu dropdown-menu-right" 
                     aria-labelledby="navbarDropdown"> 
                    <a class="dropdown-item" href="{{ route('home') }}" > 
                       {{ __('Panel użytkownika') }} </a>
                    
                   <a class="dropdown-item" href="{{ route('logout') }}" 
                      onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();"> 
                       {{ __('Wyloguj') }} </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" 
                    method="POST" style="display: none;"> 
                    @csrf 
                    </form> 
                </div> 
            </li>
            
            @endguest

          
        </ul>
      </div>
    </div>

  </nav>

<style>
/*    @if(Request::path() == 'shop' or Request::path() == 'login' or Request::path() == 'register' or Request::path() == 'home' or Request::path() == 'edit' or Request::is('updateuserform*') or Request::is('email*')
       or Request::is('addpost*') or Request::is('manageposts'))*/
    
    #mainNav .navbar-brand {
    color: white;
    }
  
  #mainNav .navbar-nav > li.nav-item > a {
    color: white;
  }
  
  #mainNav .navbar-toggler {
    color: white;
  }
  
  @endif
  
</style>


