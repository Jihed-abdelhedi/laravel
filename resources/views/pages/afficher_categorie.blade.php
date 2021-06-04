@extends('master')
@section('content')

<h1>{{ $cat->nom_categorie }}</h1>
<h4>{{ $cat->livres->count()}}  Livres</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom Livre</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($cat->livres as $livre )
    <tr>

      <th scope="row">{{ $livre->id }}</th>
      <td>{{ $livre->titre }}</td>
     
     
     
    </tr>
    @endforeach
    
  </tbody>
</table>


@endsection