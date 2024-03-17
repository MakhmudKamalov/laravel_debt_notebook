@extends('layouts.welcome')

@section('css')
  <style>
    /* public/css/custom.css */

.alert {
    transition: opacity 1.5s ease-in-out;
}

.alert-hide {
    opacity: 0;
}

  </style>
@endsection

@section('content')
<br>
@if(session('addedClient'))
<div id="alert" style="text-align: center" class="alert alert-success"></div>
@endif


<br>
@if (isset($client))
<h1 style="text-align: center">Update client</h1>
@else
<h1 style="text-align: center">Add client</h1>
@endif
<div class="row">
  <div class="col"></div>
  <div class="col">
    <div class="div" style="width: 100">
      @if (isset($client))
      <form method="POST" action="{{ Route('update-client') }}">
      @else
      <form method="POST" action="{{ Route('create-client') }}">
      @endif
        @csrf
        @if (isset($client))
          <input type="hidden" name="id" value="{{ $client->id }}">
        @endif
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text"  
           @if (isset($client))
          value="{{ old('name') ?? $client->name }}"
          @else
          value="{{ old('name')}}"
          @endif   required name="name" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('name')
          <span>{{ $message }}</span>
        @enderror
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Surname</label>
          <input type="text"
           @if (isset($client))
          value="{{ old('surname') ?? $client->surname }}"
          @else
          value="{{ old('surname')   }}"
          @endif   required name="surname"  class="form-control  @error('surname') is-invalid @enderror"  id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('surname')
        <span>{{ $message }}</span>
      @enderror
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Phone</label>
          <input type="text" 
          @if (isset($client))
          value="{{ old('phone') ?? $client->phone }}"
          @else
          value="{{ old('phone')  }}"
          @endif   required name="phone"  class="form-control  @error('phone') is-invalid @enderror"  id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('phone')
        <span>{{ $message }}</span>
      @enderror
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Debt</label>
          <input type="text" 
          @if (isset($client))
          value="{{   old('debt') ?? $client->debt}}"
          @else
          value="{{   old('debt')  }}"
          @endif  name="debt" required  class="form-control  @error('debt') is-invalid @enderror"  id="exampleInputPassword1">
        </div>
        @error('debt')
        <span>{{ $message }}</span>
      @enderror
        
      <br>
        <button type="submit" class="btn btn-success"  >Save</button>
      </form>
  
    </div>
  </div>
  <div class="col"></div>
</div>
@endsection


@section('js')

@if (session('addedClient'))
<script>
  // Функция для исчезновения сообщения через определенное время
  function hideAlert() {
      var alertElement = document.getElementById('alert');
      alertElement.style.opacity = '0'; // Применяем анимацию исчезновения
      setTimeout(function() {
          alertElement.style.display = 'none'; // Скрываем сообщение после завершения анимации
      }, 1000); // Задержка в миллисекундах перед скрытием сообщения (в данном случае 1 секунда)
  }

  // Показываем сообщение и запускаем таймер для его исчезновения
  function showAlert(message) {
      var alertElement = document.getElementById('alert');
      alertElement.innerText = message; // Устанавливаем текст сообщения
      alertElement.style.display = 'block'; // Показываем сообщение
      alertElement.style.opacity = '1'; // Сбрасываем анимацию исчезновения (если уже была применена)
      setTimeout(hideAlert, 2000); // Таймер для вызова функции hideAlert через 5 секунд (или другое нужное вам время)
  }

  // Пример вызова функции showAlert с сообщением "Привет, мир!"
  showAlert('Client added successfuly');
</script>
@endif



@endsection