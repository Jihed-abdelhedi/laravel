@extends('master')
@section('content')

<div class="card text-center">
    <div class="card-header">
      Details Livre
    </div>
    <div class="card-body">
      <h2 class="card-title">{{ $livre->titre }}</h2>
      <h6 class="card-title"> {{ $livre->category->nom_categorie }}</h6>
      <p class="card-text">{{  $livre->description }}</p>
      <a href="{{ route('acceuil') }}" class="btn btn-primary">Go back</a>
    </div>
    <div class="card-footer text-muted">
      Crée {{  $livre->created_at->diffForHumans() }}
    </div>
    <div class="card-footer text-muted">
      Mis à jour {{  $livre->updated_at->diffForHumans() }}
    </div>
  </div>

@endsection