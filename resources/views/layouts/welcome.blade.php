<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Qariz dapter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
  .nav-item {
    margin-right: 10px; /* Добавляет правый отступ между элементами списка */
}
</style> 

@yield('css')

</head>
<body>
  <nav class="py-2 bg-body-tertiary border-bottom">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
        <li class="nav-item"><a href="{{ Route('main') }}" class="nav-link link-body-emphasis px-2 active" aria-current="page">@if (Request::is('main'))
          <b>Home</b>  @else Home
        @endif </a></li>
        <li class="nav-item"><a href="{{ Route('add-client') }}" class="nav-link link-body-emphasis px-2">@if (Request::is('add-client'))
          <b>Add client</b>
        @else
        Add client
        @endif</a></li>
        <li class="nav-item"><a href="{{ Route('all-clients-page') }}" class="nav-link link-body-emphasis px-2">@if (Request::is('all-clents'))
          <b>All clients</b>
        @else
          All clients
        @endif </a></li>
        {{-- <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">About</a></li> --}}
      </ul>
      <ul class="nav">
        <li class="nav-item"><a href="{{ Route('profile-page') }}" class="nav-link link-body-emphasis px-2"><button class="form-control">Profile</button></a></li>
        <li class="nav-item"><a href="{{ Route('logout') }}" class="nav-link link-body-emphasis px-2"><button class="form-control">Logout</button></a></li>
      </ul>
    </div>
  </nav>
 <div class="container">
   @yield('content')
 </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@yield('js')  
</body>
</html>