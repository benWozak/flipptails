<header>
  <nav id="navbar" class="">
    <div class="nav-wrapper">
      <div class="logo">
        <a href="{{ url('/')}}">
          <x-fas-cocktail class="logo-icon" /> Flipptails
        </a>
        
      </div>
  
      <ul id="menu">
        <li><a class='menu-item' href="{{ url('recipes')}}">API Recipes</a></li>
        <li><a class='menu-item' href="{{ url('excel')}}">Excel Recipes</a></li>
      </ul>
    </div>
  </nav>
  
  
  <!-- Menu Icon -->
  <div class="menuIcon">
    <span class="icon icon-bars"></span>
    <span class="icon icon-bars overlay"></span>
  </div>
  
  
  <div class="overlay-menu">
    <ul id="menu">
        <li><a href="{{ url('recipes')}}">Community</a></li>
        <li><a href="{{ url('excel')}}">Personal</a></li>
      </ul>
  </div>
</header>

@section('javascript')
  <script type="text/javascript">
     let menuIcon = document.querySelector('.menuIcon');
        let nav = document.querySelector('.overlay-menu');

        menuIcon.addEventListener('click', () => {
            if (nav.style.transform != 'translateX(0%)') {
                nav.style.transform = 'translateX(0%)';
                nav.style.transition = 'transform 0.2s ease-out';
            } else { 
                nav.style.transform = 'translateX(-100%)';
                nav.style.transition = 'transform 0.2s ease-out';
            }
        });


        //==================== Toggle Menu Icon ====================
        let toggleIcon = document.querySelector('.menuIcon');

        toggleIcon.addEventListener('click', () => {
            if (toggleIcon.className != 'menuIcon toggle') {
                toggleIcon.className += ' toggle';
            } else {
                toggleIcon.className = 'menuIcon';
            }
        });
  </script>
@endsection

@yield('javascript')