@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
            <div class="col-12">
		<h2 >Dodaj post</h2>
		
                <form class="form-horizontal" method='post' action="{{ route('poststored')}}" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                        {{ csrf_field() }}
        <fieldset>

    <!-- Form Name -->
    <!-- Text input-->
        <div class="form-group">
            <label class="col-md-12 control-label" for="textinput">Naglowek</label>  
            <div class="col-md-12">
                <input id="header" name="header"  class="form-control input-md" required="" value="" type="text">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-12 control-label" for="textinput">Podtytuł</label>  
            <div class="col-md-12">
                <input id="subheader" name="subheader"  class="form-control input-md" required="" value="" type="text">
            </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-12 control-label" for="textinput">Tresc</label>  
            <div class="col-md-12">
                <textarea name="content" id="content" class="pb-cmnt-textarea" required style='width: 100%' rows='20'></textarea>
            </div>
        </div>    

        <label class="col-md-12 control-label" for="textinput">Wybierz zdjecie jako miniature</label> 
        <div class="form-group">
            <input type="file" name="file" required>
        </div>



    <!-- Button (Double) -->
    <div class="form-group">
        <label class="col-md-8 control-label" for="save"></label>
        <div class="col-md-12">
            
            <button id="save" name="save" class="btn btn-success">Dodaj</button>
            <a href="{{route('home')}}" class="btn btn-danger" title="Wroc"> Wróć </a>
        </div>
    </div>

    </fieldset>
    </form>
                
        </div>
    </div>
</div>

@endsection