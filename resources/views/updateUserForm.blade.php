@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
            <div class="col-12">
		<h2 >Informacje o użytkowniku</h2>
		
                <form class="form-horizontal" method='post' action="{{ route('updateuser', $user)}}">
                    {{ method_field('PUT') }}
                        {{ csrf_field() }}
        <fieldset>

    <!-- Form Name -->
    <!-- Text input-->
        <div class="form-group">
            <label class="col-md-12 control-label" for="textinput">Email</label>  
            <div class="col-md-12">
                <input id="email" name="email"  class="form-control input-md" required="" value="{{$user->email}}" type="email">
            </div>
        </div>

    <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Nazwa użytkownika</label>  
            <div class="col-md-12">
                <input id="name" name="name"  class="form-control input-md" required="" value="{{$user->name}}" type="text">
            </div>
        </div>
    




    <!-- Button (Double) -->
    <div class="form-group">
        <label class="col-md-8 control-label" for="save"></label>
        <div class="col-md-12">
            
            <button id="save" name="save" class="btn btn-success">Zmien</button>
            <a href="{{route('home')}}" class="btn btn-danger" title="Wroc"> Wróć </a>
        </div>
    </div>

    </fieldset>
    </form>
                
        </div>
    </div>
</div>

@endsection