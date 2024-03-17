<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
 
</style>
</head>
<body>
<div class="container" >
<div class="row">
  <div class="col"></div>
  <div class="col">
    <br>
    <h2 style="text-align: center">Register</h2>
    <div class="div" style="width: 50vh">
      <form method="POST" action="{{ Route('register-form') }}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" value="{{ old('name') }}" required name="name" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('name')
          <span>{{ $message }}</span>
        @enderror
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Surname</label>
          <input type="text" value="{{ old('surname') }}" required name="surname"  class="form-control  @error('surname') is-invalid @enderror"  id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('surname')
        <span>{{ $message }}</span>
      @enderror
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Phone</label>
          <input type="text" value="{{ old('phone') }}" required name="phone"  class="form-control  @error('phone') is-invalid @enderror"  id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('phone')
        <span>{{ $message }}</span>
      @enderror
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Login</label>
          <input type="text" value="{{ old('login') }}" name="login" required  class="form-control  @error('login') is-invalid @enderror"  id="exampleInputPassword1">
        </div>
        @error('login')
        <span>{{ $message }}</span>
      @enderror
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" value="{{ old('password') }}" required  class="form-control  @error('password') is-invalid @enderror"  id="exampleInputPassword1">
        </div>
        @error('password')
        <span>{{ $message }}</span>
      @enderror
      <br>
        <button type="submit" class="btn btn-primary" >Send</button>
      </form>
  
    </div>
  </div>
  <div class="col"></div>
</div>
  
</div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>