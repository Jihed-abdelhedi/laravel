@extends('master')
@section('content')
{{ $livre }}
<div class="card text-center">
    <div class="card-header">
      Details Livre
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $livre->titre }}</h5>
      <p class="card-text">{{  $livre->description }}</p>
      <a href="{{ route('acceuil') }}" class="btn btn-primary">Go back</a>
    </div>
    <div class="card-footer text-muted">
      {{  $livre->created_at->format('h:m d/m/Y') }}
    </div>
  </div>

@endsection