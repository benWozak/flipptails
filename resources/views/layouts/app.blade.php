<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Fliptails</title>

      <!-- Scripts -->
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])

      <!-- JavaScript -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  </head>
  <body>
    @include('layouts.partials.header')
      <main class="main-page">
          @yield('content')
      </main>
  </body>
</html>