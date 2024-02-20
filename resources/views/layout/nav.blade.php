<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="text-xl" href="{{ route('home') }}">Tailblocks</a>
      </a>
      <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
        <a class="mr-5 hover:text-gray-900" href="/login">Login</a>
        <a class="mr-5 hover:text-gray-900" href="/register">Register</a>
       @auth
       <h2>{{ Auth::user()->name }}</h2>
       @endauth
      </nav>
     @auth
     <form action="{{ route('auth.logout') }}" method="post">
      @csrf
      @method('post')
      <button  class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Log Out
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </button>
    </form>
     @endauth
    </div>
  </header>