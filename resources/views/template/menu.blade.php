
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{ route('acceuil') }}">{{ $application_name }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('acceuil') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            @foreach ($categories as $cat )
            <a class="dropdown-item" href="{{ route('afficher_categorie',$cat->id)}}"> {{ $cat->nom_categorie }} ({{ count($cat->livres) }})</a>
            @endforeach
            

          </div>
        </li>
        @auth
          
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="{{ route('ajouter_livre') }}">Ajouter Livre</a>
            <a class="dropdown-item" href="{{ route('ajouter_categorie') }}">Ajouter Categorie</a>

          </div>
        </li>
        @endauth
      </ul>
      <form class="form-inline my-2 my-lg-0 mr-5"  method="POST" action="{{ route('chercher_livre') }}">
        @csrf
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="chercher">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>


    

  @auth
    <div class="btn btn-outline-danger ml-3 mr-2">
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
          Logout
      </a>
      <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </div>
  @else
    <a class="btn btn-outline-info ml-3 mr-2" href="{{ route('login') }}">Login</a>
    <a class="btn btn-outline-info" href="{{ route('register') }}">Ajouter une compte</a>
  @endauth
  </nav>
  