<div>
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
          <h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">List Of Contacts</h1>
          <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them.</p>
        </div>
    <ul class="flex flex-wrap -m-4">
   @foreach ($contacts as $contact)

   <li class="p-4 lg:w-1/2">
    <div class="flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
      <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="https://i.pravatar.cc/200?u=${{  $contact->id}}}">
      <div class="flex-grow sm:pl-8">
        <h2 class="title-font font-medium text-lg text-gray-900"> {{$contact->name}} </h2>
       <span class="mb-3 block text-gray-600"> Email: <i class="text-gray-950">  {{$contact->email}}</i></span>
       <span class="mb-3 block text-gray-600"> Phone: <h3 class="text-gray-950">  {{$contact->phone}}</h3></span>
       <span class="mb-3 block text-gray-600"> Company: <h4 class="text-gray-950">  {{$contact->company}}</h4></span>
      </div>
    </div>
    <div class="flex justify-center gap-x-3">
        <a class=" text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-950 rounded text-lg" href="{{ route('contact.show_user', $contact->id) }}">View</a>
      
       
        <a class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-950 rounded text-lg" href="{{ route('contact.edit', $contact->id) }}">Edit</a>
      </form>
      <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-950 rounded text-lg">Delete</button>
      </form>
    </div>
  </li>


   @endforeach
    </ul>
</div>

{{ $contacts->links() }}
