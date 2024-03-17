@extends('layouts.welcome')
@section('css')
  <style>
    h1{
      text-align: center
    }
  </style>
@endsection

@section('content')


@livewire('profile-edit')
@endsection

