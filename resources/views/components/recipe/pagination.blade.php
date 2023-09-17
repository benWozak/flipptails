<nav class="pagination"> 
  <ul > 
    @foreach (['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'] as $letter)
      <li><a class="page-anchor" href="{{url('recipes', ['filter' => $letter])}}" class="nav-link">{{ $letter }}</a></li> 
    @endforeach
  </ul> 
</nav>