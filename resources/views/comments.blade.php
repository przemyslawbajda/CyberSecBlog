



 


    @guest
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nie jesteś zalogowany') }}</div>

                <div class="card-body">

                    <a href="{{ route('login') }}">Zaloguj się</a> by dodać komentarz
                </div>
            </div>
        </div>
    </div>
</div>
    
    @else
    
    @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" style="margin-left:15%; margin-right: 15%; margin-top: 5% ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
    
    
    <div class="container pb-cmnt-container" >
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-info">
                <div class="panel-body">
                    <form class="form-inline" role="form"  action="{{ route('store', $post->id ) }}" id="comment-form" 
                   method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <textarea name="message" id="message" placeholder="Napisz komentarz!" class="pb-cmnt-textarea" required></textarea>
                        <button class="btn btn-primary pull-right" type="submit">Dodaj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endguest 

 

<div class="ccontainer" >

<div class="row">
<div class="col-sm-12">
<h3>Komentarze:</h3>
</div><!-- /col-sm-12 -->
</div><!-- /row -->


    <!--wyświetlenie komentarzy-->
    @foreach($comments as $comment)
    @if ($comment->post_id == $post->id)
    <div class="row">
        <div class="col-sm-1">
            <div class="thumbnail">
            <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
            </div><!-- /thumbnail -->
        </div><!-- /col-sm-1 -->

        <div class="col-sm-10">
            <div class="panel panel-default">
            <div class="panel-heading">
                <strong>{{$comment->user->name}}</strong> <span class="text-muted">dodano {{$comment->updated_at}}</span> 
                @auth
                    
                    <div style="display: flex; justify-content: flex-end">
                    @if($comment->user_id == \Auth::user()->id)    
                        <a style="margin-right: 2%" href="{{ route('edit', $comment) }}">Edytuj </a> 
                        @endif 
                    @if($comment->user_id == \Auth::user()->id or \Auth::user()->status_id == 2)  
                        <a href="{{ route('delete', $comment) }}" > Usuń </a></div>
                    @endif
                    @endauth
            </div>
                
            <div class="panel-body">
            {{$comment->message}}
            </div><!-- /panel-body -->
            </div><!-- /panel panel-default -->
        </div><!-- /col-sm-5 -->
        </div><!-- /row -->
    @endif
    
    @endforeach
 

</div><!-- /container -->


<?php
$links = session()->has('links') ? session('links') : [];
$currentLink = request()->path(); // Getting current URI like 'category/books/'
array_unshift($links, $currentLink); // Putting it in the beginning of links array
session(['links' => $links]); // Saving links array to the session



?>