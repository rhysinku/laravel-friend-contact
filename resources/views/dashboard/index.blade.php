@extends('layout.layout')

 @section('content')

@auth
@include('includes.AddContact')
@include('contact.search')
@include('.contact.contacts')
@endauth

@guest
  @include('auth.register')
@endguest



 @endsection