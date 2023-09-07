<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        @if ($title)
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __($title) }}
                        </h2>
                        @endif
                
                        @if ($tagline)
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __($tagline) }}
                        </p>
                        @endif
                    </header>
                    {{ $slot }}
                </section>
            </div>
        </div>
    </div>
</div>