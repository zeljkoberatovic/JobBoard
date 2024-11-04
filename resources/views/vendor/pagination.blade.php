@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-between my-4">
        <div class="flex-1 flex justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="disabled text-gray-400 cursor-not-allowed">&laquo; Prva</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="text-blue-600 hover:text-blue-500 transition duration-150 ease-in-out flex items-center">
                    Predhodna
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="text-blue-600 hover:text-blue-500 transition duration-150 ease-in-out flex items-center">
                    Sledeća 
                </a>
            @else
                <span class="disabled text-gray-400 cursor-not-allowed">Sledeća</span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:justify-center">
            <span class="relative z-0 flex rounded-md shadow-sm"> 
                @if ($paginator->onFirstPage())
                    <span class="disabled text-gray-400 cursor-not-allowed">&laquo;</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out">
                        Predhodna
                    </a>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="disabled text-gray-500 cursor-not-allowed">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="bg-blue-600 text-white px-4 py-2 border border-blue-600 text-sm font-medium rounded-md">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="relative flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out">
                        Sledeća 
                    </a>
                @else
                    <span class="disabled text-gray-400 cursor-not-allowed">&raquo;</span>
                @endif
            </span>
        </div>
    </nav>
@endif
