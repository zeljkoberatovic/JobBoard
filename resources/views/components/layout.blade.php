@component('components.head')
@endcomponent

    <body class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-blue-300 via-blue-200 to-gray-300 text-slate-900">
        <!--{{ auth()->user()->name ?? 'Guest' }}-->
        
        <nav class="mb-8 flex justify-between text-lg font-medium">
                      <ul class="flex space-x-2">
                        <li>
                          <a href="{{ route('jobs.index') }}">Home</a>
                        </li>
                      </ul>
              <ul class="flex space-x-2">
                @auth
                  <li>
                    <a href="{{ route('my-job-applications.index') }}">
                      {{ auth()->user()->name ?? 'Anynomus' }}: Applications
                    </a>
                  </li>

                  <li>
                    <a href="{{ route('my-jobs.index') }}">My Jobs</a>
                  </li>


                  <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button>Logout</button>
                    </form>
                  </li>
                @else
                  <li>
                    <a href="{{ route('auth.create') }}">Sign in</a>
                  </li>
                @endauth
              </ul>
        </nav>
          
              <!--flash poruka-->
              @if (session('success'))
                <div role="alert"
                  class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
                  <p class="font-bold">Success!</p>
                  <p>{{ session('success') }}</p>
                </div>
              @endif

              @if (session('error'))
                <div role="alert"
                  class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
                  <p class="font-bold">Error!</p>
                  <p>{{ session('error') }}</p>
                </div>
              @endif
         {{ $slot }}
      </body>
</html>
