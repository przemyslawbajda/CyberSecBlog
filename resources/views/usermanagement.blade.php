@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Zarządzaj użytkownikami</h1>
            <table class="table table-bordered">
                <thead> 
                    <th>Nazwa użytkownika</th>
                    <th>Email</th>
                    <th style="width: 200px">Od</th>
                    <th width="200px">Akcja</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ route('showuser', $user->id) }}" class="btn btn-info" style='width: 200px; margin-bottom: 2%'>Wyswietl użytkownika</a>
                        <a href="{{ route('deleteuser', $user->id) }}" class="btn btn-danger" style='width: 200px'>Usuń post</a>
                        
                    </td>
                </tr>
                @endforeach
                </tbody>
                
            </table>
            <a href="{{route('home')}}" class="btn btn-danger" style="float: right; margin-top: 1%">Wróc</a>
        </div>
    </div>
</div>
@endsection