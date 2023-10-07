<x-page-content :title="__($title)" :tagline="__($tagline)" >
    <form method="{{ $method }}" action="{{ $action }}" class="mt-6 space-y-6" id="{{ $name }}"  enctype="multipart/form-data">
        @csrf
        {{ $slot }}
    </form>
</x-page-content>