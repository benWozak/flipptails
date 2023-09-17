@extends('layouts.app')
@section('content')
<br/>
<br/>
<br/>
<h1>Community Recipes</h1>
<div>
  <x-recipe.pagination />
  <div class='grid-container'>
    @if(count($recipes) === 0)
      <h1>Empty</h1>
    @else
      @foreach ($recipes as $recipe)
        <x-recipe.card class='grid-item' :recipe="$recipe" />
      @endforeach
    @endif
  </div>
</div>

{{-- @section('javascript') --}}
  <script type="text/javascript">
    const cards = document.querySelectorAll('.card');
    console.log('hit')
    function cardTransition() {
      if (this.classList.contains('active')) {
        this.classList.remove('active')
      } else {
        this.classList.add('active');
      }
    }

    cards.forEach(card => card.addEventListener('click', cardTransition));


    if(window.location.pathname) {
      const url = window.location.pathname;
      const subRoute = url.substr(url.lastIndexOf("/")+1);
      window.addEventListener("load", (event) => {

        document.querySelectorAll('.page-anchor').forEach(page => {
          if(subRoute === page.innerHTML) {
            page.classList.add('active-page');
          }
        });
      });
    }
  </script>
{{-- @endsection --}}
{{-- @yield('javascript') --}}