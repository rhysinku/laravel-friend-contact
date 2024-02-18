@extends('layout.layout')

@section('content')
<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
      <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $contactShow->name }}
        </h1>
        <span class="mb-3 block text-gray-600"> Email: <h3 class="text-gray-950">  {{$contactShow->email}}</h3></span>
        <span class="mb-3 block text-gray-600"> Phone: <h3 class="text-gray-950">  {{$contactShow->phone}}</h3></span>
        <span class="mb-3 block text-gray-600"> Company: <h4 class="text-gray-950">  {{$contactShow->company}}</h4></span>
        <div class="flex justify-center">
          <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-950 rounded text-lg">Edit</button>
            <form action="{{ route('contact.destroy', $contactShow->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="ml-4 inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-950 rounded text-lg">Delete</button>
            </form>
        </div>
      </div>

      <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
        <img class="object-cover object-center rounded" alt="hero" src="https://i.pravatar.cc/720?u=${{  $contactShow->id}}}">
      </div>

    </div>
  </section>
  @endsection