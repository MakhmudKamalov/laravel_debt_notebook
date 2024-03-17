@extends('layouts.welcome')

@section('css')
  <style>
    th,td,h1{
      text-align: center
    }

    h1{
      font-family: Georgia, 'Times New Roman', Times, serif
    }
  </style>
@endsection

@section('content')
<br>
@if(session('success'))
<div id="alert" style="text-align: center" class="alert alert-success"></div>
@endif
  <h1>All clients</h1>
  <br>
  @livewire('clients-table')

@endsection

@section('js')

@if (session('success'))
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
      setTimeout(hideAlert, 1500); // Таймер для вызова функции hideAlert через 5 секунд (или другое нужное вам время)
  }

  // Пример вызова функции showAlert с сообщением "Привет, мир!"
  showAlert('Client updated successfuly');
</script>
@endif



@endsection