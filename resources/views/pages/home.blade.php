@extends('master')
@section('content')
{{ $livres }}
<h3>{{ $livres->count() }} Livres affiché sur {{$livres->total()}}</h3>
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
       
        <td><a href="{{ route('afficher_livre',$livre->id) }}" class="btn btn-primary">Voir</a></td>
        <td><a href="{{ route('supprimer_livre',$livre->id) }}" class="btn btn-danger">Supprimer</a></td>
      </tr>
      
      @endforeach
    </tbody>
  </table>
  {{ $livres->links() }}
@endsection

@section('footer')
footer home
@endsection