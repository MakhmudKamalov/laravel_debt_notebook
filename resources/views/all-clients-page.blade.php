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
  <h1>All clients</h1>
  <br>

@livewire('all-clients')

@endsection