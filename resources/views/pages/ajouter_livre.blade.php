@extends('master')
@section('content')
<form method="POST" action="{{ route('post_ajouter_livre') }}">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Titre Livre</label>
      <input type="text" name="titre" value="{{old('titre')}}" class="form-control">
    </div>

    @error('titre')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror

    <div class="form-group">
        <label for="sel1">Choisir Categorie :</label>
        <select class="form-control" name="category_id">
          <option value="informatique">Informatique</option>
          <option value="science">Science</option>
        </select>
      </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea name="description"  class="form-control"  rows="3">{{old('description')}}</textarea>
    </div>

    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
   
    <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Ajouter">
    </div>
  </form>
@endsection