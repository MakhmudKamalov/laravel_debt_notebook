@extends('layouts.welcome')
@section('css')
  <style>
    th,td,h1,h3{
      text-align: center
    }

    h1, h3{
      font-family: Georgia, 'Times New Roman', Times, serif
    }
  </style>
@endsection

@section('content')
<br>
  <h1>Client history:  {{ $client['surname'].' '.$client['name'] }}</h1>
  <h3>Phone:  {{ $client['phone'] }}</h3>
  <h3>Debt:  {{ $client['debt'] }} $</h3>
  <br>




 @livewire('client-history') 
@endsection