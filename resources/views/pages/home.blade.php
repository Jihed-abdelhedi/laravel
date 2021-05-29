@extends('master')
@section('content')
{{ $livres }}
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titre</th>
        
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($livres as $livre )
            
       
      <tr>
        <th scope="row">{{ $livre->id }}</th>
        <td>{{ $livre->titre }}</td>
       
        <td><a href="#" class="btn btn-primary">Voir</a></td>
      </tr>
      
      @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
footer home
@endsection