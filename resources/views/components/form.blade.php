{{-- <div class="relative flex-grow max-w-full flex-1 px-4">
    <div class="bg-white dark:bg-gray-800 p-6 rounded flex flex-wrap  @if($small) w-1/2 @else @endif mx-auto">
        <h1>{{ $title }}</h1>
        <form method="{{ $method }}" action="{{ $action }}" class="form" id="{{ $name }}">
            @csrf
            {{ $slot }}
        </form>
    </div>
</div> --}}

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __($title) }}
                        </h2>
                
                        @if ($tagline)
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __($tagline) }}
                        </p>
                        @endif
                    </header>
                <form method="{{ $method }}" action="{{ $action }}" class="mt-6 space-y-6" id="{{ $name }}">
                    @csrf
                    {{ $slot }}
                </form>
            </div>
        </div>
    </div>
</div>